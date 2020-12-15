<?php

namespace App\Http\Controllers;

use App\Cart_model;
use App\Orders_model;
use App\ProductAtrr_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function index(){
        $menu_active=6;
        $session_id=Session::get('session_id');
        $cart_datas=Cart_model::where('session_id',$session_id)->get();
        $total_price=0;
        foreach ($cart_datas as $cart_data){
            $total_price+=$cart_data->price*$cart_data->quantity;
        }
        $shipping_address=DB::table('delivery_address')->where('users_id',Auth::id())->first();
        return view('checkout.review_order',compact('menu_active','shipping_address','cart_datas','total_price'));
    }
    public function order(Request $request){
        $input_data=$request->all();
        $payment_method=$input_data['payment_method'];
        $products_id=$input_data['products_id'];
        $quantity=$input_data['quantity'];
        Orders_model::create($input_data);
        $product_atrrs=ProductAtrr_model::where('id',$products_id)->get();
        foreach ($product_atrrs as $product_atrr){
         DB::table('product_att')->where('id',$products_id)->update([
            'stock'=>$product_atrr->stock-$quantity
        ]);
     }

        if($payment_method=="COD"){
            return redirect('/cod');
        }else{
            return redirect('/paypal');
        }
    }
    public function cod(){
        $menu_active=6;
        $user_order=Orders_model::where('users_id',Auth::id())->first();
        return view('payment.cod',compact('menu_active','user_order'));
    }
    public function paypal(Request $request){
        $menu_active=6;
        $who_buying=Orders_model::where('users_id',Auth::id())->first();
        return view('payment.paypal',compact('menu_active','who_buying'));
    }
}
