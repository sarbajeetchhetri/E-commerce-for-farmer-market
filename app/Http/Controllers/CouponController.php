<?php

namespace App\Http\Controllers;

use App\Coupon_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\User;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verified=User::findOrFail(auth::user()->id);
        if($verified['image']=='') {
            return redirect()->route('farmer_home')->with('message','Please update Your KYC first!');
        }
        elseif($verified['email_verified_at']==''){
             return redirect()->route('farmer_home')->with('message','Your Kyc is being processed please wait for a while! Thank You !!');
            
        }
        
        else{
        $menu_active=4;
        $coupons=Coupon_model::all()->where('session_id',auth::user()->id);
        return view('backEnd.coupon.index',compact('menu_active','coupons'));
    }
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $verified=User::findOrFail(auth::user()->id);
        if($verified['image']=='') {
            return redirect()->route('farmer_home')->with('message','Please update Your KYC first!');
        }
        elseif($verified['email_verified_at']==''){
             return redirect()->route('farmer_home')->with('message','Your Kyc is being processed please wait for a while! Thank You !!');
            
        }
        
        else{
        $menu_active=4;
        return view('backEnd.coupon.create',compact('menu_active'));
    }
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verified=User::findOrFail(auth::user()->id);
        if($verified['image']=='') {
            return redirect()->route('farmer_home')->with('message','Please update Your KYC first!');
        }
        elseif($verified['email_verified_at']==''){
             return redirect()->route('farmer_home')->with('message','Your Kyc is being processed please wait for a while! Thank You !!');
            
        }
        
        else{
        $this->validate($request,[
            'coupon_code'=>'required|min:4|max:15|unique:coupons,coupon_code',
            'amount'=>'required|numeric',
            'expiry_date'=>'required|date'
        ]);
        $input_data=$request->all();
        $input_data['session_id']=auth::user()->id;
        if(empty($input_data['status'])){
            $input_data['status']=0;
        }
        Coupon_model::create($input_data);
        return back()->with('message','Cupon Added Successfully!');
    }
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $verified=User::findOrFail(auth::user()->id);
        if($verified['image']=='') {
            return redirect()->route('farmer_home')->with('message','Please update Your KYC first!');
        }
        elseif($verified['email_verified_at']==''){
             return redirect()->route('farmer_home')->with('message','Your Kyc is being processed please wait for a while! Thank You !!');
            
        }
        
        else{
        $menu_active=4;
        $edit_coupons=Coupon_model::findOrFail($id);
        return view('backEnd.coupon.edit',compact('menu_active','edit_coupons'));
    }
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $verified=User::findOrFail(auth::user()->id);
        if($verified['image']=='') {
            return redirect()->route('farmer_home')->with('message','Please update Your KYC first!');
        }
        elseif($verified['email_verified_at']==''){
             return redirect()->route('farmer_home')->with('message','Your Kyc is being processed please wait for a while! Thank You !!');
            
        }
        
        else{
        $update_coupon=Coupon_model::findOrFail($id);
        $this->validate($request,[
            'coupon_code'=>'required|min:4|max:15|unique:coupons,coupon_code,'.$update_coupon->id,
            'amount'=>'required|numeric',
            'expiry_date'=>'required|date'
        ]);
        $input_data=$request->all();
        $input_data['session_id']=auth::user()->id;
        if(empty($input_data['status'])){
            $input_data['status']=0;
        }
        $update_coupon->update($input_data);
        return redirect()->route('coupon.index')->with('message','Cupon updated Successfully!');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_coupon=Coupon_model::findOrFail($id);
        $delete_coupon->delete();
        return back()->with('message','Delete Coupon Already!');
    }
    public function applycoupon(Request $request){
        $this->validate($request,[
            'coupon_code'=>'required'
        ]);
        $input_data=$request->all();
        $coupon_code=$input_data['coupon_code'];
        $total_amount_price=$input_data['Total_amountPrice'];
        $check_coupon=Coupon_model::where('coupon_code',$coupon_code)->count();
        if($check_coupon==0){
            return back()->with('message_coupon','Your Coupon Code Not Exist!');
        }else if($check_coupon==1){
            $check_status=Coupon_model::where('status',1)->first();
            if($check_status->status==0){
                return back()->with('message_coupon','Your Coupon was Disabled!');
            }else{
                $expiried_date=$check_status->expiry_date;
                $date_now=date('Y-m-d');
                if($expiried_date<$date_now){
                    return back()->with('message_coupon','Your Coupon was Expired!');
                }else{
                    $discount_amount_price=($total_amount_price*$check_status->amount)/100;
                    Session::put('discount_amount_price',$discount_amount_price);
                    Session::put('coupon_code',$check_status->coupon_code);
                    return back()->with('message_apply_sucess','Your Coupon Code was Apply');
                }
            }
        }
    }
}
