<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_model extends Model
{
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable=['categories_id','p_name','description','price','image','session_id'];

    public function category(){
        return $this->belongsTo(Category_model::class,'categories_id','id');
    }
    public function attributes(){
        return $this->hasMany(ProductAtrr_model::class,'products_id','id');
    }
}
