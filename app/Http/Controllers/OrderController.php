<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use Auth;
Use Alert;
use DB;

class OrderController extends Controller
{

    public function store(Request $request)
    {

        $order = Orders::create([
            'id_user'        => $request->input('id_user'),
            'nama_pembeli'   => $request->input('nama_pembeli'),
            'alamat_pengiriman'   => $request->input('alamat_pengiriman'),
            'kontak_pembeli' => $request->input('kontak_pembeli'),
            'total_price'    => $request->input('total_price'),
            'sts'         => 'pending',

        ]);

        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);
        for ($product=0; $product < count($products); $product++) {
            if ($products[$product] != '') {
                $order->products()->attach($products[$product],['quantity' => $quantities[$product]]);
            }
        }
        
        Alert::success('Success', 'Order Disimpan');
        return back();

    }

    public function setCompleted($id)
    {
        DB::select(DB::raw(" 
        UPDATE orders SET sts='completed' 
        WHERE id_order=$id"
        ));
        Alert::success('Order Selesai!', 'Kembali');
        return back();
    }

    public function destroy($id)
    {
        Orders::find($id)->delete();
        Alert::success('Order Berhasil Dihapus!', 'Kembali');
        return back();
    }
}
