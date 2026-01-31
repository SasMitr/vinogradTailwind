<?php

namespace App\Models\Shop\Order;
class CustomerData
{
    public $phone;
    public $name;
    public $email;
    public $other_phone;

    public function __construct($phone = '', $name = '', $email = '', $other_phone = '')
    {
        $this->phone = $phone;
        $this->name = $name;
        $this->email = $email;
        $this->other_phone = $other_phone;
    }
}
