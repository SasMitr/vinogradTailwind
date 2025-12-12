<?php

namespace App\Models\Shop;

class Selection extends Category
{
    const TITLE = 'Селекционер';

    protected $table = 'vinograd_selections';

    public function getCategoryFieldAttribute()
    {
        return 'selection';
    }
}
