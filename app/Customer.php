<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $table="customer";
    public function bill(){
        return $this->hasMany('App\Bill','id_customer','id');
    }
}
