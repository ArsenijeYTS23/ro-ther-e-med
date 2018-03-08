<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pacient extends Model
{
  
    function program(){
        return $this->belongsTo(Program::class);
    }
    function videoGiant(){
        return $this->hasMany(VideoGiant::class);
    }
    function blogGiant(){
        return $this->hasMany(BlogGiant::class);
    }
    
    function photoGiant(){
        return $this->hasMany(PhotoGiant::class);
    }
    
   
}
