<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use App\Products;
use App\Orders;
use Auth;
use DB;
use Image;
use Alert;



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
        $total_sales = DB::select( DB::raw("SELECT sum(total_price) as 'total_sales' FROM orders WHERE sts='completed' AND id_user=$id_user") );
        $total_orders_completed = DB::select( DB::raw("SELECT count(id_order) as 'orders_completed' FROM orders WHERE sts='completed' and id_user=$id_user") );

        $products = Products::all()->sortBy('name');
        $orders_id=DB::table('orders')->select('id_order')->where('id_user','=',$id_user)->first();
        $orders_pending=Orders::with('products')->where('id_user', '=', $id_user)->where('sts','=','pending')->get();
        $orders_completed=Orders::with('products')->where('id_user', '=', $id_user)->where('sts','=','completed')->orderBy('updated_at','DESC')->get();
  
        return view('sales-force.sales-force-page',compact('products','orders_pending','orders_completed','total_sales','total_orders_completed'));
    }

    public function updateProfileImage(Request $request){


        $this->validate($request, [
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_user' => 'required'
        ]);

        if($request->hasFile('profile_image')){
            $profile_image = $request->file('profile_image');
            $filename = time() . '.' . $profile_image->getClientOriginalExtension();
            Image::make($profile_image)->resize(300, 300)->save( public_path('/images/profile/' . $filename ) );
            $user = Auth::user();
            $user->profile_image = $filename;
            $user->save();
            Alert::success('Profile Diupdate !', 'Kembali');
            return back();
        }
        else{
            Alert::failed('Gagal !', 'Kembali');
            return back();
        }

    }
}
