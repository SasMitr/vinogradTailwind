<?php

namespace App\Services;

use App\Mail\Admin\OrderAddMail;
use App\Models\Shop\Order\Order;
use App\Notifications\OrderCustomerMail;
use App\Notifications\OrderReplyCustomerMail;
use App\Notifications\SendCodeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailService
{
    public function sendMail($order)
    {
        Mail::to(config('main.admin_email'))->send(new OrderAddMail($order));

        if($order->customer['email']) {
            $order->notify(new OrderCustomerMail($order));
        }
    }

    public function sendCodeMail($order, $code)
    {
        if($order->customer['email']) {
            $order->notify(new SendCodeMail($order, $code));
        }
    }

    public function sendReplyMail(Order $order, Request $request)
    {
        $order->notify(new OrderReplyCustomerMail($order, $request));
//        return $order->notify(new OrderReplyCustomerMail($order, $request));
    }
}
