<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nastavak extends Model
{
    function pacient(){
        return $this->belongsTo(Pacient::class);
    }
    function diagnosas(){
        return $this->belongsTo(Diagnosa::class);
    }
}
