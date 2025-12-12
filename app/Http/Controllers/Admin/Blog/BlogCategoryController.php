<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    public function __invoke()
    {
        return view('admin.blog.categories');
    }
}
