<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public function orders(){
        return $this->belongsTo('App\Orders');
    }

    public function article(){
        return $this->belongsTo('App\Articles');
    }
}
