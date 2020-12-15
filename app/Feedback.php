<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Feedback extends Model
{
    protected $table='feedbacks';
    protected $primaryKey='id';
    protected $fillable=['feedbacks','reply','uid','email','from_user','to_user'];

public function isAdmin(){
        return ($this->usertype == 1);
    }

    public function isFarmer(){
        return ($this->usertype == 2);
    }
}