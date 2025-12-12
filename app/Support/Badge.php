<?php

namespace App\Support;

use App\Models\Shop\Contact;
use App\Models\Shop\Order\Order;
use App\Status\Status;
use Illuminate\Support\Arr;

class Badge
{
    public $badges = [];

    public function __construct()
    {
        $this->badges[route('admin.order.index')] = $this->quantityOrders();
        $this->badges[route('admin.messages.index')] = $this->quantityMessages();
        $this->badges[route('admin.blog.comments')] = $this->quantityPostComment();
        $this->badges[route('admin.product.comment.index')] = $this->quantityProductComment();
    }

    public function exists($key): bool
    {
        return Arr::exists($this->badges, $key);
    }

    public function badge($value): string
    {
        return $this->badges[$value];
    }

    public function badgeSection($items)
    {
        $arr = collect($items)->flip();
        return collect($this->badges)->intersectByKeys($arr)->join('');
    }

    private function quantityOrders(): string
    {
        $array = Order::query()->quantityOrdersByStatus();
        $view = '';

        foreach ($array as $key => $value) {
            if(in_array($key, Order::ORDERED_LIST)) {
                $view .= $this->getHTML($key, $value);
            }
        }

        return $view;
    }

    private function quantityMessages(): string
    {
        $value = Contact::query()->where('mark_as_read', 1)->count();
        return $this->getHTML(5, $value);
    }

    private function quantityPostComment()
    {
        return $this->getHTML(5, 4);
    }

    private function quantityProductComment()
    {
        return $this->getHTML(1, 2);
    }

    private function getHTML($key, $value): string
    {
        return ($value)
            ? "<span class='px-1 text-". Status::color($key) ."-400 ml-1'>$value</span>"
            : '';
    }
}
