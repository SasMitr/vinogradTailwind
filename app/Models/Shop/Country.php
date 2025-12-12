<?php

namespace App\Models\Shop;

class Country extends Category
{
    const TITLE = 'Страна происхождения';

    protected $table = 'vinograd_countrys';

    public function getCategoryFieldAttribute()
    {
        return 'country';
    }
}
