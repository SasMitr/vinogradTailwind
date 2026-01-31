<?php

namespace App\Http\Controllers\Admin\Shop\Order;

use App\Http\Controllers\Controller;
use App\Models\Shop\Currency;
use App\Models\Shop\Order\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderIndexController extends Controller
{
    public function __invoke(Request $request, $status = false)
    {
        $orders = Order::query()->getFilterOrders($request, $status);
//        dd($orders);
        return view('admin.shop.order.index', [
            'orders' => $orders,
            'currency' => Currency::all()->keyBy('code')->all(),
            'statusesList' => OrderService::getArrayStasusesList($orders)
        ]);
    }
}
