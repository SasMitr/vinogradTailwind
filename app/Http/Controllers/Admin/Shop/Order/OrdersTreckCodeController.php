<?php

namespace App\Http\Controllers\Admin\Shop\Order;

use App\Http\Requests\Admin\Shop\Order\OrdersTreckCodeRequest;
use App\Http\Controllers\Controller;
use App\Models\Shop\Order\Order;
use App\Services\SendMailService;
use App\Services\StatusService;
use App\Status\Status;
use RuntimeException;

class OrdersTreckCodeController extends Controller
{
    public function statusTreckCode (OrdersTreckCodeRequest $request, Order $order, SendMailService $mail, StatusService $statusService)
    {
        try {
            $statusService->setStatus($order, Status::SENT, $request->track_code);
            $mail->sendCodeMail($order, $request->track_code);
            return ['success' => [
                    'status' => $order->statuses->name(Status::SENT),
                    'info' => view('admin.shop.order.partials.viber_info', ['order' => $order])->render(),
                    'track_code_block' => view('admin.shop.order.partials.track_code', ['order' => $order])->render(),
                    'status_history' => view('admin.shop.order.partials.status_history', ['order' => $order])->render()
                ]
            ];
        } catch  (RuntimeException $e) {
            return ['errors' => [$e->getMessage()]];
        }
    }

    public function treckCode(OrdersTreckCodeRequest $request, Order $order)
    {
        try {
            $order->update(['track_code' => $request->track_code]);
            return ['success' => 'ok'];
        } catch  (RuntimeException $e) {
            return ['errors' => [$e->getMessage()]];
        }
    }
}
