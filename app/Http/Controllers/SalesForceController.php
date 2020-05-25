<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Orders;
use Auth;
use DB;



class SalesForceController extends Controller
{
    public function SalesForcePage()
    {
        //get products for adding orders
        $id_user = Auth::user()->id_user;
        $products = Products::all();
        $orders=DB::table('orders')->where('id_user', '=', $id_user)->get();
        $orders_id=DB::table('orders')->select('id_order')->where('id_user','=',$id_user)->first();
        $orders_products=Orders::with('products')->where('id_user', '=', $id_user)->get();
  

        
        return view('sales-force.sales-force-page',compact('products','orders','orders_products'));
    }
}
