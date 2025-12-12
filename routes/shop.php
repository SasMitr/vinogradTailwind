<?php

use App\Http\Controllers\Web\Shop\CategoryController;
use App\Http\Controllers\Web\Shop\IndexController;
use App\Http\Controllers\Web\Shop\ProductController;
use Illuminate\Support\Facades\Route;

// middleware('web')
// as('shop.')

Route::get('/', IndexController::class)->name('home');
Route::get('/category.html', CategoryController::class)->name('category');
Route::get('/category/page-{page}.html', CategoryController::class)->where(['page'=>'[0-9]*'])->name('category.page');

Route::get('/product/{product:slug}.html', ProductController::class)->name('product');

