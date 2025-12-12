<?php

namespace App\Http\Controllers\Admin\Shop\Dashboard;

use App\Http\Controllers\Controller;

class DashboardToastrController extends Controller
{
    public function __invoke()
    {
        return view('admin.shop.dashboard.toastr');
    }
}
