<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    //


    public function roles(){
        return $this->belongsToMany('App\Role');
    }
}
