<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elekta2 extends Model
{
   function pacient(){
     return   $this->belongsTo(Pacient::class);
    }
}
