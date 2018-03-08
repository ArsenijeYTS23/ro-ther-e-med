<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rola extends Model
{
  function user(){
        return $this->hasMany(User::class);
    }
}
