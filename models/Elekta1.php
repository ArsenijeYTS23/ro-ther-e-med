<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elekta1 extends Model
{
     function pacient(){
     return   $this->belongsTo(Pacient::class);
    }
}
