<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localizationlike extends Model
{
     function localization(){
        return $this->belongsToMany(Localization::class);
    }
}
