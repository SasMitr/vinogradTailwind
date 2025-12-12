<?php

use App\Http\Controllers\Web\Cabinet\IndexController;
use App\Http\Controllers\Web\Cabinet\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

// middleware(['auth', 'verified'])
// prefix('cabinet')
// as('cabinet.')
// name('cabinet.')

Route::get('/', IndexController::class)->name('dashboard');

Route::prefix('profile')->as('profile.')->group(function (){
    Route::get('/', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
});

