<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pomeranje extends Model
{
 function pacient(){
     return   $this->belongsTo(Pacient::class);
    }
}
