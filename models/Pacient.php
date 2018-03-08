<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pacient extends Model
{
    use SoftDeletes;
    
    function localization(){
        return $this->belongsTo(Localization::class);
    }
    function pomeranje(){
        return $this->hasOne(Pomeranje::class);
    }
     function diagnosas(){
        return $this->belongsTo(Diagnosa::class);
    }
     function odluka(){
        return $this->belongsTo(Odluka::class);
    }
     function doctor(){
        return $this->belongsTo(Doctor::class);
    }
      function primus(){
         return $this->hasOne(Primus::class);
    }
    function oncor(){
         return $this->hasOne(Oncor::class);
    }
    function elekta1(){
         return $this->hasOne(Elekta1::class);
    }
    function nastavak(){
         return $this->hasMany(Nastavak::class);
    }
    function nastavakZadnji(){
         return $this->hasMany(Nastavak::class)->latest()->limit(1);
    }
     function test($nb){
        return $this[$nb];
    }
     
      public function scopeLokalizacija($query,$lokal)
    {
        return $query->where('localization_id',$lokal);
    }
      public function scopeFilter($query,$sortBy,$naziv)
    {
        return $query->where($sortBy,$naziv);
    }
      public function scopeKonzilijum($query)
    {
        return $query->where('konzilijum','<>',0)
                ->where('konzilijum','<>',null);
    }
      public function scopeNijeObradjen($query)
    {
        return $query->where(function ($r) {
                 $r->where('obrada',0)
                      ->orWhere('obrada', null);
            });
    }
      public function scopeObradjen($query)
    {
        return $query->where(function ($r) {
                 $r->where('obrada','<>',0)
                      ->where('obrada','<>', null);
            });
    }
      public function scopeNijePoceo($query)
    {
        return $query-> where(function ($r) {
                 $r->where('pocetak','=',0)
                      ->orWhere('pocetak','=', null);
            });
    }
      public function scopePoceo($query)
    {
        return $query-> where(function ($r) {
                 $r->where('pocetak','<>',0)
                      ->where('pocetak','<>', null);
            });
    }
      public function scopeNijeZavrsio($query)
    {
        return $query->where(function ($r) {
                 $r->where('kraj','=',0)
                      ->orWhere('kraj','=', null);
            });
    }
    
}
