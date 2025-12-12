<?php

namespace App\Http\Controllers\Admin\Shop\Dashboard;

use App\Http\Controllers\Controller;

class DashboardIndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.shop.dashboard.index');
    }
}
