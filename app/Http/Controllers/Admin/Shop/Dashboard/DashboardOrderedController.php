<?php

namespace App\Http\Controllers\Admin\Shop\Dashboard;

use App\Http\Controllers\Controller;

class DashboardOrderedController extends Controller
{
    public function __invoke(): string
    {
        return view('admin.shop.dashboard.ordered');
    }
}
