<?php

namespace App\Http\Controllers\Admin\Shop\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Order\OrdersDateBuildRequest;
use App\Models\Shop\Order\Order;

class OrdersDateBuildController extends Controller
{

    public function __invoke (OrdersDateBuildRequest $request, Order $order)
    {
        try {
            $order->update(['date_build' => $request->date_build]);
            return ['success' => 'ok'];
        } catch  (\RuntimeException $e) {
            return ['errors' => [$e->getMessage()]];
        }
    }

}
