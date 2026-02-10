<?php

namespace App\Http\Controllers\Admin\Shop\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Order\OrderSendMessageRequest;
use App\Models\Shop\Order\Order;
use App\Models\Shop\Order\OrderCorrespondence;
use App\Services\SendMailService;
use Exception;

class OrderSendMessageController  extends Controller
{
    public function __invoke(OrderSendMessageRequest $request, Order $order)
    {
        try {
            (new SendMailService)->sendReplyMail($order, $request);

            OrderCorrespondence::add($request->message, $order->id);
            return [
                'success' => view('admin.shop.order.partials.order-correspondence', ['order' => $order])->render()
            ];
        } catch (Exception $e) {
            return ['errors' => [$e->getMessage()]];
        }
    }
}
