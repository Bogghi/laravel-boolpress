<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    //posts tabel

    protected $guarded = [];

    public function user(){

        return $this->belongTo('App\User');

    }
}
