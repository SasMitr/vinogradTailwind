<?php

use App\Http\Controllers\Admin\Blog\BlogCategoryController;
use App\Http\Controllers\Admin\Blog\BlogCommentController;
use App\Http\Controllers\Admin\Blog\BlogPostController;
use App\Http\Controllers\Admin\Shop\Category\CategoryIndexController;
use App\Http\Controllers\Admin\Shop\CKeditor\CKeditorUploadImageController;
use App\Http\Controllers\Admin\Shop\Dashboard\DashboardIndexController;
use App\Http\Controllers\Admin\Shop\Dashboard\DashboardModificationController;
use App\Http\Controllers\Admin\Shop\Dashboard\DashboardOrderedController;
use App\Http\Controllers\Admin\Shop\Dashboard\DashboardToastrController;
use App\Http\Controllers\Admin\Shop\Messages\MessegesIndexController;
use App\Http\Controllers\Admin\Shop\Modification\CreateModificationController;
use App\Http\Controllers\Admin\Shop\Modification\IndexModificationController;
use App\Http\Controllers\Admin\Shop\Modification\RemoveModificationController;
use App\Http\Controllers\Admin\Shop\Modification\UpdateModificationController;
use App\Http\Controllers\Admin\Shop\ModificationProduct\AddModificationProductController;
use App\Http\Controllers\Admin\Shop\ModificationProduct\CreateModificationProductController;
use App\Http\Controllers\Admin\Shop\ModificationProduct\UpdateModificationProductController;
use App\Http\Controllers\Admin\Shop\Order\OrderIndexController;
use App\Http\Controllers\Admin\Shop\Product\ProductCommentsIndexController;
use App\Http\Controllers\Admin\Shop\Product\ProductCreateController;
use App\Http\Controllers\Admin\Shop\Product\ProductIndexController;
use App\Http\Controllers\Admin\Shop\Product\ProductRemoveImgGallery;
use App\Http\Controllers\Admin\Shop\Product\ProductResetCatalogController;
use App\Http\Controllers\Admin\Shop\Product\ProductToggleStatusController;
use App\Http\Controllers\Admin\Shop\Product\ProductUpdateController;
use Illuminate\Support\Facades\Route;

// prefix('admin')
// as('admin.')

Route::as('dashboard.')->prefix('dashboard')->group(function (){
    Route::get('/sorts', DashboardIndexController::class)->name('index');
    Route::get('/product-modification-product', DashboardModificationController::class)->name('product-modification-product');
    Route::get('/ordered', DashboardOrderedController::class)->name('ordered');
    Route::get('/toastr', DashboardToastrController::class)->name('toastr');
});

Route::as('product.')->prefix('product')->group(function () {
    Route::get('/index/{status?}', ProductIndexController::class)->name('index');

    Route::get('/create', [ProductCreateController::class, 'show'])->name('create.show');
    Route::patch('/create', [ProductCreateController::class, 'create'])->name('create');

    Route::get('/update/{product}', [ProductUpdateController::class, 'show'])->name('update.show');
    Route::patch('/update/{product}', [ProductUpdateController::class, 'update'])->name('update');

    Route::get('/toggle-status/{product_id}', ProductToggleStatusController::class)->name('toggle.status');

    Route::post('/remove-img-gallery', ProductRemoveImgGallery::class)->name('remove.img.gallery');

    Route::get('/reset-catalog', ProductResetCatalogController::class)->name('reset.catalog');

    Route::as('comment.')->prefix('comment')->group(function () {
        Route::get('/', ProductCommentsIndexController::class)->name('index');
    });
});

Route::as('modification.')->prefix('modification')->group(function () {
    Route::get('/', IndexModificationController::class)->name('index');

    Route::get('/create', [CreateModificationController::class, 'form'])->name('create.form');
    Route::patch('/create', [CreateModificationController::class, 'create'])->name('create');

    Route::get('/update/{modification}', [UpdateModificationController::class, 'form'])->name('update.form');
    Route::patch('/update/{modification}', [UpdateModificationController::class, 'update'])->name('update');

    Route::delete('/remove/{modification}', RemoveModificationController::class)->name('remove');
});

Route::as('modification-product.')->prefix('modification-product')->group(function () {
    Route::get('/add-for-product/{product_id}', AddModificationProductController::class)->name('create.for.product.show');
    Route::patch('/create-for-product', CreateModificationProductController::class)->name('create.for.product');
    Route::post('/update-for-product/{modification_id}', UpdateModificationProductController::class)->name('update.for.product');
});

Route::as('category.')->prefix('category')->group(function () {
    Route::get('/', CategoryIndexController::class)->name('index');
});

Route::as('blog.')->prefix('blog')->group(function () {
    Route::get('/posts', BlogPostController::class)->name('posts');
    Route::get('/category', BlogCategoryController::class)->name('categories');
    Route::get('/comments', BlogCommentController::class)->name('comments');
});

Route::as('order.')->prefix('order')->group(function () {
    Route::get('/{status?}', OrderIndexController::class)->name('index');
});

Route::as('messages.')->prefix('messages')->group(function () {
    Route::get('/', MessegesIndexController::class)->name('index');
});

Route::as('ckeditor.')->prefix('ckeditor')->group(function () {
    Route::post('/upload-image', CKeditorUploadImageController::class)->name('upload.image');
});


