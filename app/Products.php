<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public $primaryKey='id_product';
    protected $fillable = [
        'name',
        'type',
        'price',
        'description'
    ];
    public $timestamps='true';
}
