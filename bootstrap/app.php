<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\UserActive;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {

            Route::middleware('web')
                ->as('shop.')
                ->group(base_path('routes/shop.php'));

            Route::middleware(['web', UserActive::class])
                ->prefix('cabinet')
                ->as('cabinet.')
                ->name('cabinet.')
                ->group(base_path('routes/cabinet.php'));

            Route::middleware(['web', Admin::class])
                ->prefix('admin')
                ->as('admin.')
                ->group(base_path('routes/admin.php'));

        },
    )
    ->withMiddleware(function (Middleware $middleware) {
//        $middleware->redirectGuestsTo(fn (Request $request) => route('shop.home'));
        $middleware->validateCsrfTokens(except: [
            '/admin/ckeditor/upload-image'  //  отключить для маршрута csrf
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
