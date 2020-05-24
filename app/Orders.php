<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public $primarykey='id_order';
    protected $fillable = [
        'id_user',
        'nama_pembeli',
        'kontak_pembeli',
        'total_price',
        'status',
    ];
    public $timestamps='true';

    public function products()
    {
        return $this->belongsToMany('App\Products', 'orders_products', 
        'id_order','id_product')->withPivot(['quantity']);
    }
}
