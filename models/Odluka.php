<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odluka extends Model
{
    function pacient(){
        return $this->hasMany(Pacient::class);
    }
}
