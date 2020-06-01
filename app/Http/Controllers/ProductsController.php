<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Auth;
Use Alert;
use DB;


class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('admin.products.admin-products',compact('products'));
    }

    public function addProduct(Request $request){
        $product = Products::create([
            'name'        => $request->input('name'),
            'type'   => $request->input('type'),
            'price'   => $request->input('price'),
            'description' => $request->input('description'),
        ]);

        $product->save();
        Alert::success('Success', 'Product Disimpan');
        return back();
    }
}
