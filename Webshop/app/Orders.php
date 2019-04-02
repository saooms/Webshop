<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //


    public function orderDetails(){
        return $this->hasMany('App\OrderDetails');
    }
}
