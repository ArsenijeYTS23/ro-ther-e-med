<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
     function pacient(){
        return $this->hasMany(Pacient::class);
    }
     function nastavak(){
        return $this->hasMany(Nastavak::class);
    }
}
