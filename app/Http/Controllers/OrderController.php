<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrdersModel;
use App\ProductModel;

class OrderController extends Controller
{
    public function create()
    {
        $products = ProductModel::all();
        return view('admin.orders.create', compact('products'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = OrdersModel::create($request->all());

        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);
        for ($product=0; $product < count($products); $product++) {
            if ($products[$product] != '') {
                $order->products()->attach($products[$product], ['quantity' => $quantities[$product]]);
            }
        }

        return redirect()->route('admin.orders.index');
    }
}
