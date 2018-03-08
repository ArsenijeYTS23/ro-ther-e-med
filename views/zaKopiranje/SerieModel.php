<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pacient extends Model
{
  
    function program(){
        return $this->belongsTo(Program::class);
    }
    function episode(){
        return $this->hasMany(Episode::class);
    }
  
   
}
