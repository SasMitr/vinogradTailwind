<?php

namespace App\Http\Controllers\Admin\Shop\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Order\OrdersCurrencyRequest;
use App\Models\Shop\Order\Order;
use App\Services\StatusService;

class OrdersCurrencyController extends Controller
{

    public function __invoke (OrdersCurrencyRequest $request, Order $order, StatusService $statusService)
    {
        try {
            $order->update(['currency' => $request->currency]);
            return ['success' => 'ok'];
        } catch  (\RuntimeException $e) {
            return ['errors' => [$e->getMessage()]];
        }
    }

}
