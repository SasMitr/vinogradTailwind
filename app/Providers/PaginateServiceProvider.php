<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PaginateServiceProvider extends ServiceProvider
{
    public function register(): void
    {}

    public function boot(): void
    {
        view()->composer('web.partials.pagination', function($view) {
            $view->with('pattern', [
                '~\/page-\d+\.html\?page=1$~',
                '~\/page-\d+\.html\?page=(\d+)~',
                '~\.html\?page=1$~',
                '~\.html\?page=(\d+)~',
                '~\/page-\d+\?page=1$~',
                '~\/page-\d+\\?page=(\d+)~',
                '~\\?page=1$~',
                '~\\?page=(\d+)~'
            ]);
            $view->with('replace', [
                '.html',
                '/page-$1.html',
                '.html',
                '/page-$1.html',
                '',
                '/page-$1',
                '',
                '/page-$1'
            ]);
        });
    }
}
