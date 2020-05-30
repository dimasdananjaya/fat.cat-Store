<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public $primaryKey='id_order';
    protected $fillable = [
        'id_user',
        'nama_pembeli',
        'alamat_pengiriman',
        'kontak_pembeli',
        'total_price',
        'sts',
    ];
    public $timestamps='true';

    public function products()
    {
        return $this->belongsToMany('App\Products', 'orders_products', 
        'id_order','id_product')->withPivot(['quantity']);
    }
}
