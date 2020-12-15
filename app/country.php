<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $table='countries';
    protected $primaryKey='id';
    protected $fillable=['country_code','country_name'];
}

