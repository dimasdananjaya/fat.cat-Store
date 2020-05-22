<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function SalesForcePage()
    {
        return view('sales-force.sales-force-page');
    }
}
