<?php

namespace App\Http\Controllers\Admin\Shop\Messages;

use App\Http\Controllers\Controller;

class MessegesIndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.shop.messege.index');
    }
}
