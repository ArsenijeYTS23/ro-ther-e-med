<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     function isSuperAdmin(){
       if($this->rola_id==1){
           return true;
       }
           return false;
       
    }
     function isDoktor(){
       if($this->rola_id==2){
           return true;
       }
           return false;
       
    }
    
    function rola(){
        return $this->belongsTo(Rola::class);
    }
    function localization(){
        return $this->belongsToMany(Localization::class,'localizationlike');
    }
    
}
