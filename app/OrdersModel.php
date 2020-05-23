<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    protected $table='orders';
    public $timestamp='true';

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity']);
    }
}
