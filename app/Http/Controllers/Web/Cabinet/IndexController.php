<?php

namespace App\Http\Controllers\Web\Cabinet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('web.cabinet.dashboard');
    }
}
