<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Primus extends Model
{
     function pacient(){
     return   $this->belongsTo(Pacient::class);
    }
}
