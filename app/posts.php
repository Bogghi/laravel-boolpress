<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    //posts tabel

    public function user(){

        return $this->belongTo('App\User');

    }
}
