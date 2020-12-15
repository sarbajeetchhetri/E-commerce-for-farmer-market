<?php

namespace App\Http\Controllers;

use App\ProductAtrr_model;
use App\Products_model;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProductAtrrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'quality'=>'required',
            'weight'=>'required',
            'price'=>'required|numeric',
            'stock'=>'required|numeric'
        ]);
        ProductAtrr_model::create($request->all());
        return back()->with('message','Attribute Added Successfully');
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
        $verified=User::findOrFail(auth::user()->id);
        if($verified['image']=='') {
            return redirect()->route('farmer_home')->with('message','Please update Your KYC first!');
        }
        elseif($verified['email_verified_at']==''){
             return redirect()->route('farmer_home')->with('message','Your Kyc is being processed please wait for a while! Thank You !!');
            
        }
        
        else{
        $menu_active =3;
        $attributes=ProductAtrr_model::where('products_id',$id)->get();
        $product=Products_model::findOrFail($id);
        return view('backEnd.products.add_pro_atrr',compact('menu_active','product','attributes'));
    }
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request_data=$request->all();
        foreach ($request_data['id'] as $key=>$attr){
            $update_attr=ProductAtrr_model::where([['products_id',$id],['id',$request_data['id'][$key]]])
                ->update(['quality'=>$request_data['quality'][$key],'weight'=>$request_data['weight'][$key],'price'=>$request_data['price'][$key],
                    'stock'=>$request_data['stock'][$key]]);
        }
        return back()->with('message','Attribute Updated Successfully !');
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
        //
    }
    public function deleteAttr($id){
        $deleteAttr=ProductAtrr_model::findOrFail($id);
        $deleteAttr->delete();
        return back()->with('message','Deleted Successfully!');
    }
}
