<?php

namespace App\Http\Controllers\Web\Shop\ViewModels;

use App\Http\Requests\Shop\SortPostsRequest;
use App\Models\Shop\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\ViewModels\ViewModel;

class CategoryViewModal extends ViewModel
{
    public function __construct(
        public SortPostsRequest $request,
        public int $per_page,
        public int|null $page
    ){}

    public function products(): LengthAwarePaginator
    {
        return Product::query()->getCategoryProducts($this->request, false, $this->per_page, $this->page);
    }
}
