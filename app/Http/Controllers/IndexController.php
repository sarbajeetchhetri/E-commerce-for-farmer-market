<?php

namespace App\Http\Controllers;

use App\Category_model;
use App\ImageGallery_model;
use App\ProductAtrr_model;
use App\Products_model;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $menu_active=1;
        $products=Products_model::all();
        return view('frontEnd.index',compact('menu_active','products'));
    }

    public function about(){
        $menu_active=2;
        $products=Products_model::all();
        return view('frontEnd.about',compact('menu_active','products'));
    }
    
    public function newsfeed(){
        $menu_active=3;
        $products=Products_model::all();
        return view('frontEnd.newsfeed',compact('menu_active','products'));
    }

    public function contact(){
        $menu_active=4;
        $products=Products_model::all();
        return view('frontEnd.contact',compact('menu_active','products'));
    }

    public function shop(){
        $menu_active=5;
        $products=Products_model::all();
        $byCate="";
        return view('frontEnd.products',compact('menu_active','products','byCate'));
    }
    public function listByCat($id){
        $menu_active=1;
        $list_product=Products_model::where('categories_id',$id)->get();
        $byCate=Category_model::select('name')->where('id',$id)->first();
        return view('frontEnd.products',compact('list_product','byCate','menu_active'));
    }
    public function detialpro($id){
        $menu_active=1;
        $detail_product=Products_model::findOrFail($id);
        $imagesGalleries=ImageGallery_model::where('products_id',$id)->get();
        $totalStock=ProductAtrr_model::where('products_id',$id)->sum('stock');
        $relateProducts=Products_model::where([['id','!=',$id],['categories_id',$detail_product->categories_id]])->get();
        return view('frontEnd.product_details',compact('menu_active','detail_product','imagesGalleries','totalStock','relateProducts'));
    }
    public function getAttrs(Request $request){
        $all_attrs=$request->all();
        //print_r($all_attrs);die();
        $attr=explode('-',$all_attrs['weight']);
        //echo $attr[0].' <=> '. $attr[1];
        $result_select=ProductAtrr_model::where(['products_id'=>$attr[0],'weight'=>$attr[1]])->first();
        echo $result_select->price."#".$result_select->stock;
    }
}
