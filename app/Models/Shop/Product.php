<?php

namespace App\Models\Shop;

use App\Http\Requests\Admin\Shop\Product\ProductRequest;
use App\Models\DTO\Meta;
use App\Models\DTO\ProductProps;
use App\Models\Shop\QueryBuilder\ProductQueryBuilder;
use App\Models\Traits\GalleryServais;
use App\Models\Traits\HasSlug;
use App\Models\Traits\ImageServais;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use ImageServais;
    use GalleryServais;
    use HasSlug;

    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;


    public $imageList = [
        '500x650',        //вспомогательное фото
        '100x100',        //Отображается в админке
    ];

    protected $table = 'vinograd_products';
    public $timestamps = false;
    protected $fillable = ['category_id', 'selection_id', 'country_id', 'title', 'content', 'description', 'name', 'slug', 'ripening'];

    protected $casts = [
        'meta' => 'array',
        'props' => 'array'
    ];

    public function newEloquentBuilder($query): ProductQueryBuilder
    {
        return new ProductQueryBuilder($query);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function selection()
    {
        return $this->belongsTo(Selection::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function commentsCount()
    {
        return $this->hasMany(Comment::class)->active()->count();
    }

    public function modifications()
    {
        return $this->hasMany(Modification::class)->where('quantity', '>', 0);
    }

    public function adminModifications()
    {
        return $this->hasMany(Modification::class);
    }

//----------- scope --------------------

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 1);
//        return $query->where('status', 0);
    }

    public function scopeGetByStatus(Builder $query, $status): Builder
    {
        return $query->where('status', $status);
    }

    public function scopeRipening(Builder $query, $request): Builder
    {
        return $request->get('ripening_by')
            ? $query->where('ripening', $request->get('ripening_by'))
            : $query;
    }

    public function scopeSort(Builder $query, $sort): Builder
    {
        return $sort
            ? $query->orderBy(key($sort), $sort[key($sort)])->orderBy('name', 'asc')
            : $query->orderBy('existence', 'desc')->orderBy('name', 'asc');
    }

    public function scopeCategory(Builder $query, $request, $category): Builder
    {
        if ($category){
            $query->where('vinograd_products.' . $category->category_field . '_id', $category->id);
        }

        if ($request->country && $request->selection) {
            $query->where(function ($query) use ($request) {
                $query->whereIn('country_id', $request->country)
                    ->orWhereIn('selection_id', $request->selection);
            });
        } elseif ($request->country){
            $query->whereIn('country_id', $request->country);
        } elseif ($request->selection){
            $query->whereIn('selection_id', $request->selection);
        }

        return $query;
    }

    public function scopeCategoryCountry(Builder $query, $country): Builder
    {
        if ($country){
            return $query->whereIn('selection_id', $country);
        }
        return $query;
    }

    public function scopeCategorySelection(Builder $query, $selection): Builder
    {
        if ($selection){
            return $query->whereIn('selection_id', $selection);
        }
        return $query;
    }

    public function scopeFiltered(Builder $query): Builder
    {
//        return app(Pipeline::class)
//            ->send($query)
//            ->through(filters())
//            ->thenReturn();

        foreach (filters() as $filter) {
            $query = $filter->apply($query);
        }
        return $query;
    }

//----------- end scope ---------------------------------------------

    public function setCategory($id)
    {
        if($id == null) {return;}
        $this->category_id = $id;
        $this->save();
    }

//    public function getCategory()
//    {
//        return ($this->category != null)
//            ?   $this->category->name
//            :   'Категория не присвоена';
//    }

//    public function getCategoryID()
//    {
//        return $this->category != null ? $this->category->id : null;
//    }

    public static function add(ProductRequest $request): Product
    {
        $product = new static;
        $product->fill($request->all());
        $product->meta = Meta::fromRequest($request);
        $product->props = ProductProps::fromRequest($request);
        $product->save();

        return $product;
    }

    public function edit(ProductRequest $request): void
    {
        $this->fill($request->all());
        $this->meta = Meta::fromRequest($request);
        $this->props = ProductProps::fromRequest($request);
        $this->save();
    }

    public function remove()
    {
        $this->deleteImages();
        $this->delete();
    }

    public function setDraft()
    {
        $this->status = Product::IS_DRAFT;
        return $this->save();
    }

    public function setPublic()
    {
        $this->status = Product::IS_PUBLIC;
        return $this->save();
    }

    public function toggleStatus($value)
    {
        return $value ? $this->setDraft() : $this->setPublic();
//        return ($value == null) ? $this->setDraft() : $this->setPublic();
    }

    public function toggledsStatus()
    {
//        dd($this->status, $this->status === 0, $this->status === null);
        return $this->status === 0 ? $this->setPublic() : $this->setDraft();
//        return $this->status === 0 ? dd('true', $this->status === 0) : dd('false', $this->status === 0);
    }

    public function setFeatured()
    {
        $this->is_featured = 1;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_featured = 0;
        $this->save();
    }

    public function toggleFeatured($value)
    {
        return ($value == null) ? $this->setStandart() : $this->setFeatured();
    }

    public function canBeCheckout($modificationId, $quantity): bool
    {
        $modification = Modification::find($modificationId);
        return $quantity <= $modification->quantity;
//        return $quantity <= $this->getModification($modificationId)->quantity;
    }

    public function checkout($modificationId, $quantity): void
    {
        $modifications = $this->modifications;
        foreach ($modifications as $i => $modification) {
            if ($modification->isIdEqualTo($modificationId)) {
                $modification->checkout($quantity);
                return;
            }
        }
    }

    public function getModifications()
    {
        return $this->modifications()->where('quantity', '>=', 0)->get();
    }

    public function getModification($id)
    {
        foreach ($this->modifications as $modification) {
            if ($modification->isIdEqualTo($id)) {
                return $modification;
            }
        }
        throw new \DomainException('Modification is not found.');
    }

    public function getModificationPrice($id)
    {
        foreach ($this->modifications as $modification) {
            if ($modification->isIdEqualTo($id)) {
                return $modification->price;
            }
        }
        throw new \DomainException('Modification is not found.');
    }

    public function StrLimit($str, $limit)
    {
        return STR::limit(wp_strip_all_tags(htmlspecialchars_decode($str)), $limit);
    }

    public function classNameByIDForCache()
    {
        return 'contents-'.strtolower(class_basename(self::class)).'-'.$this->id;
    }
}
