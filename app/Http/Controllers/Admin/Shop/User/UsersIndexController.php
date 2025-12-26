<?php

namespace App\Http\Controllers\Admin\Shop\User;

use App\Http\Controllers\Controller;
use App\Models\Shop\User;

class UsersIndexController extends Controller
{
    public function __invoke(?string $status = null)
    {
        return view('admin.shop.user.index', [
            'users' => User::paginate(15)
        ]);
    }
}
