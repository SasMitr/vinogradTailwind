<?php

namespace App\Http\Controllers\Admin\Shop\Modification;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Modification\UpdateModificationRequest;
use App\Models\Shop\Modification;
use Illuminate\Http\Request;

class UpdateModificationController extends Controller
{
    public function form(Request $request, Modification $modification)
    {
        if($request->ajax()){
            return response()->json([
                'success' => [
                    'body' => view('admin.shop.modification.partials._form', ['modification' => $modification])->render(),
                    'header' => $modification->name . ' - редактировать'
                ]
            ]);
        }
        return view('admin.shop.modification.update', ['modification' => $modification]);
    }

    public function update(UpdateModificationRequest $request, Modification $modification)
    {
        try {
            $modification->edit($request->all());

            return ($request->ajax())
                ? ['success' => view('admin.shop.modification.partials._tr', ['modification' => $modification])->render()]
                : redirect()->route('admin.modification.index');

        } catch (\Exception $e) {
            return ($request->ajax()) ?  ['errors' => $e->getMessage()] : back()->withErrors([$e->getMessage()]);
        }
    }
}
