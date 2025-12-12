<?php

namespace App\Providers;

use App\Menu\Admin\Sidebar;
use App\Support\Badge;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AdminSidebarProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('admin.layouts.shared.sidebar', function ($view) {
            $view->with('adminSidebar', new Sidebar(new Badge()));
        });
    }
}
