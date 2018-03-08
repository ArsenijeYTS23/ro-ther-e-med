<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pacient extends Model
{
  
    function giant(){
        return $this->belongsTo(Giant::class);
    }
   
  
   
}
