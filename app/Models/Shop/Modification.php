<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;
class Modification extends Model
{
    protected $table = 'vinograd_modifications';
    public $timestamps = false;
    protected $fillable = ['name', 'weight'];

    public static function create($fields)
    {
        $modification = new static;
        $modification->fill($fields);
        $modification->save();
        return $modification;
    }

    public function edit($fields): void
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }

}
