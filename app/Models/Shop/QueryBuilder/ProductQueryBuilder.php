<?php

namespace App\Models\Shop\QueryBuilder;

use App\Models\Shop\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductQueryBuilder extends Builder
{
    public function getFilteredProducts(): ProductQueryBuilder
    {
        return $this->active()
            ->with('modifications.property', 'selection:id,name,slug', 'country:id,name,slug')
            ->where(function (Builder $query) {
                    $query->filtered();
                })
            ->paginate(30)
            ->withQueryString();
    }

    public function getCategoryProducts($request, $category, $per_page, $page): LengthAwarePaginator
    {
        return $this->
            with('modifications.property')->
            leftJoin('vinograd_product_modifications AS modifications', function ($join) {
                $join->on('vinograd_products.id', '=', 'modifications.product_id')
                    ->where('modifications.quantity', '>', 0);
            })->
            selectRaw('vinograd_products.id, vinograd_products.name, vinograd_products.slug, vinograd_products.description,
                                                                    Case COUNT(`modifications`.`id`) When 0 Then 0 Else 1 END AS `existence`')->
            active()->
            groupBy('vinograd_products.id', 'vinograd_products.name', 'vinograd_products.slug', 'vinograd_products.description', 'vinograd_products.ripening')->
            ripening($request)->
            sort($this->getSort($request))->
            category($request, $category)->
            paginate($per_page, ['*'], 'page', $page);
    }

    public function adminProductIndex(string|null $status)
    {
//        dd($status);
        return $this->
            select('id', 'name', 'slug', 'category_id', 'status')->
            with([
                'category:id,name',
                'adminModifications' => [
                    'property:id,name',
                ],
            ])->
            when(!is_null($status), function (Builder $query) use ($status) {
                $query->where('status', $status);
            })->
//            get();
            paginate(15);
    }








    public function getSort($request)
    {
        return ($request->get('order_by'))
            ? current(array_column(Category::$sortProductList, $request->order_by))
            : false;
    }
}
