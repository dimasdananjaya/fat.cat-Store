<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class RouteController extends Controller
{
    public function SalesForcePage()
    {
        //get products for adding orders
        $products = Products::all();
        return view('sales-force.sales-force-page',compact('products'));
    }
}
