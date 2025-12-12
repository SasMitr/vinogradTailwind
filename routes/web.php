<?php

//Route::as('shop.')->group( function() {
//    Route::get('/', DashboardIndexController::class)->name('home');
//    Route::get('/category.html', CategoryController::class)->name('category');
//    Route::get('/category/page-{page}.html', CategoryController::class)->where(['page'=>'[0-9]*'])->name('category.page');
//});






//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';
