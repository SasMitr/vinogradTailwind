<?php

namespace App\Models\Shop\Order;

use Illuminate\Database\Eloquent\Model;

class OrderCorrespondence extends Model
{
    protected $table = 'vinograd_order_correspondence';
    public $timestamps = false;
    protected $fillable = ['order_id', 'created_at', 'message'];

    public static function add($message, $order_id)
    {
        $item = new static;
        $item->created_at = time();
        $item->message = $message;
        $item->order_id = $order_id;
        $item->save();
    }

}
