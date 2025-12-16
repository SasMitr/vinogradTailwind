<?php

namespace App\Http\Controllers\Admin\Shop\Modification;

use App\Http\Requests\Admin\Shop\Modification\CreateModificationRequest;
use App\Models\Shop\Modification;
use Illuminate\Http\Request;

class CreateModificationController
{
    public function form(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'body' => view('admin.shop.modification.partials._form')->render(),
                'header' => 'Добавить модификацию'
            ]);
        }
        return view('admin.shop.modification.create');
    }

    public function create(CreateModificationRequest $request)
    {
        try {
            $modification = Modification::create($request->all());

            return ($request->ajax())
                ? [
                    'success' => view('admin.shop.modification.partials._tr', ['modification' => $modification])->render(),
                    'id' => $modification->id
                ]
                : redirect()->route('admin.modification.index');

        } catch (\Exception $e) {
            return ($request->ajax()) ? ['errors' => $e->getMessage()] : back()->withErrors([$e->getMessage()]);
        }
    }
}
