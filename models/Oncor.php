<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oncor extends Model
{
    function pacient(){
     return   $this->belongsTo(Pacient::class);
    }
}
