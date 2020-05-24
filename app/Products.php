<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public $primarykey='id_product';
    protected $fillable = [
        'name',
        'type',
        'price',
        'description'
    ];
    public $timestamps='true';
}
