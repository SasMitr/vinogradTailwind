<?php

namespace App\Http\Controllers\Admin\Shop\User;

use App\Http\Controllers\Controller;
use App\Models\Shop\User;
use Illuminate\View\View;

class UsersIndexController extends Controller
{
    public function __invoke(?string $status = null) :View
    {
        return view('admin.shop.user.index', [
            'users' => User::query()->paginate(15)
        ]);
    }
}
