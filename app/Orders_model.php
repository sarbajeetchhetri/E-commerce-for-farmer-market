<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders_model extends Model
{
    protected $table='orders';
    protected $primaryKey='id';
    protected $fillable=['users_id',
        'users_email','name','address','city','state','pincode','country','mobile','product_name','quantity','shipping_charges','coupon_code','coupon_amount',
        'order_status','payment_method','grand_total','farmer_id','products_id'];
}
