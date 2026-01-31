<?php

namespace App\Models\Shop\Order;

use App\Models\Shop\DeliveryMethod;

class DeliveryData
{
    public $method_id;
    public $method_name;
    public $cost;
    public $index;
    public $address;
    public $weight;

    private $delivery;

    public function __construct($method_id = DeliveryMethod::SELF_DELIVERY)
    {
        $this->delivery = DeliveryMethod::find($method_id);

        $this->method_id = $this->delivery->id;
        $this->method_name = $this->delivery->name;

        $this->setAddress();
        $this->setWeight();
    }

    public function setWeight($weight = 0)
    {
        $this->weight = $weight;
        $this->cost = $this->delivery->getDeliveryCost($weight);
    }

    public function setAddress($index = '', $address = '')
    {
        $this->index = $index;
        $this->address = $address;
    }
}
