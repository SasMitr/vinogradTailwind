<?php

namespace App\Http\Controllers\Admin\Shop\Order;

use App\Http\Controllers\Controller;
use App\Models\Shop\Order\Order;
use Illuminate\Http\Request;

class OrdersAdminNoteController extends Controller
{

    public function __invoke (Request $request, Order $order)
    {
        try {
            $order->update(['admin_note' => $request->admin_note]);
            return ['success' => 'ok'];
        } catch  (\RuntimeException $e) {
            return ['errors' => [$e->getMessage()]];
        }
    }

//    public function noteEdit(Request $request, OrderService $service)
//    {
//        $this->validate($request, [
//            'admin_note' =>  'required|string',
//        ]);
//
//        try {
//            $service->adminNoteEdit($request);
//            return back()->with('status', 'Примечание сохранено!');
//        } catch (\DomainException $e) {
//            return back()->withErrors([$e->getMessage()]);
//        }
//    }

}
