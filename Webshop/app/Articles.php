<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{

    public function categories(){
        return $this->belongsTo('App\Categories');
    }
}
