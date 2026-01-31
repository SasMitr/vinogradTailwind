<?php

namespace App\Http\Controllers\Admin\Shop\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Order\OrdersSelectStatusRequest;
use App\Models\Shop\Order\Order;
use App\Services\StatusService;
use App\Status\Status;

class OrdersSelectStatusController extends Controller
{

    public function __invoke (OrdersSelectStatusRequest $request, Order $order, StatusService $statusService)
    {
        try {
            if ($request->status_id == Status::SENT){
                return ['success' => [
                        'code_form' => view('admin.shop.order.partials.treck_code_form', ['order' => $order])->render(),
                    ]
                ];
            }
            $statusService->setStatus($order, $request->status_id);
//            $order->refresh();
            return ['success' => [
                    'status' => $order->statuses->name($request->status_id),
                    'status_history' => view('admin.shop.order.partials.status_history', ['order' => $order])->render()
                ]
            ];
        } catch  (\RuntimeException $e) {
            return ['errors' => [$e->getMessage()]];
        }
    }

}
