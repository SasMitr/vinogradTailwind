<?php

namespace App\Http\Controllers\Admin\Shop\Modification;

use App\Http\Controllers\Controller;
use App\Models\Shop\Modification;

class IndexModificationController extends Controller
{
    public function __invoke()
    {
        return view('admin.shop.modification.index', [
            'modifications' => Modification::all()
        ]);
    }
}
