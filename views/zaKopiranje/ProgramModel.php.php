<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pacient extends Model
{
  
    function serie(){
        return $this->hasOne(Serie::class);
    }
    function giant(){
        return $this->hasMany(Giant::class);
    }
     function experence(){
        return $this->hasMany(Experence::class);
    }
   
}
