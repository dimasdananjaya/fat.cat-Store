<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use Auth;


class OrderController extends Controller
{

    public function store(Request $request)
    {

        $order = Orders::create([
            'id_user'       => $request->input('id_user'),
            'nama_pembeli'   => $request->input('nama_pembeli'),
            'kontak_pembeli'   => $request->input('kontak_pembeli'),
            'total_price'           => $request->input('total_price'),
            'status'           => 'pending',

        ]);

        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);
        for ($product=0; $product < count($products); $product++) {
            if ($products[$product] != '') {
                $order->products()->attach($products[$product],['quantity' => $quantities[$product]]);
            }
        }
    
        return back();
    }
}
