<?php

namespace App\Notifications;

use App\Models\Shop\Order\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendCodeMail extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Order $order) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Ваш заказ на сайте '.config('app.name').' отправлен. Трек код посылки')
            ->markdown('vendor.notifications.send_code', [
                'order' => $this->order
            ]);
    }
}
