<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    function pacient(){
        return $this->hasMany(Pacient::class);
    }
    function user(){
        return $this->belongsToMany(User::class,'localizationlike')->withPivot('user_id');
    }
    function localizationlike(){
        return $this->hasMany(Localizationlike::class);
    }
}
