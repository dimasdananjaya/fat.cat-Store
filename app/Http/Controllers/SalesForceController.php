<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use App\Products;
use App\Orders;
use Auth;
use DB;



class SalesForceController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function SalesForcePage()
    {
        //get products for adding orders
        $id_user = Auth::user()->id_user;
        $products = Products::all();
        $orders_id=DB::table('orders')->select('id_order')->where('id_user','=',$id_user)->first();
        $orders_products=Orders::with('products')->where('id_user', '=', $id_user)->where('sts','=','pending')->get();
        $orders_completed=Orders::with('products')->where('id_user', '=', $id_user)->where('sts','=','completed')->get();
  

        
        return view('sales-force.sales-force-page',compact('products','orders_products','orders_completed'));
    }

    public function updateProfileImage(Request $request){

        $id_user=Auth::user()->id_user;
        $user=User::find($id_user);
        $this->validate($request, [
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_user' => 'required'
        ]);

        if ($request->hasFile('profile_image')) {
            

            $image = $request->file('profile_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/profile/');
            $image->move($destinationPath, $name);
            $user->profile_image=$name;
            $user->save();
    
            Alert::success('Profile Diupdate!', 'Kembali');
            return view('sales-force.sales-force-page',compact('products','orders_products','orders_completed'));
        }
        else{
            Alert::failed('Gagal !', 'Kembali');
            return view('sales-force.sales-force-page',compact('products','orders_products','orders_completed'));
        }

    }
}
