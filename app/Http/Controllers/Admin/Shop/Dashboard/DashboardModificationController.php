<?php

namespace App\Http\Controllers\Admin\Shop\Dashboard;

use App\Http\Controllers\Controller;

class DashboardModificationController extends Controller
{
    public function __invoke(): string
    {
        return view('admin.shop.dashboard.modification');
    }
}
