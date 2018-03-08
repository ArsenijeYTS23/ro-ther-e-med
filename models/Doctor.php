<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
     function pacient(){
        return $this->hasMany(Pacient::class);
    }
   public function scopeNijeObradjen()
    {
        return $this->pacient()->where('obrada',null);
    }
    
     public function scopeObradjen($query,$obrada='obrada',$poi)
    {
         if($obrada=='obrada'){
        return $this->pacient()->where($obrada,'<>',null);
         }else{
              return $this->pacient()->whereHas('nastavakZadnji',function ($query) use ($obrada,$poi){
    $query->where($obrada, '<>', null)->where($poi,null);
});
         }
         
    }
     public function scopeNijePoceo()
    {
        return $this->pacient()-> where('pocetak',null);
    }
     public function scopePoceo()
    {
        return $this->pacient()-> where('pocetak','<>', null);
    }
     public function scopeNijeZavrsio()
    {
        return $this->pacient()->where(function ($r) {
                 $r->where('kraj','=',0)
                      ->orWhere('kraj','=', null);
            });
    }
     public function palijacija()
    {
         foreach($this->pacient as $pac){
             if($pac->nastavak->last()!=null){
             $nastavak[]=$pac->nastavak->last();
             }
         }
          $nast=collect($nastavak)->sortByDesc('nastavakKonzilijum')->values();  
          foreach($nast as $nas){
              $pacijent[]=$nas->pacient;
          }
          return $pacijent;
    }
    function dodatak(){
         foreach($this as $p){
            if($p->nastavak->last()!=null){
                $t[]=[$p,$p->nastavak->last()->nastavakKonzilijum,'n'];
            }else{
               $t[]=[$p,$p->konzilijum];
            }
        }
        $pl= collect($t)->sortBy(1)->values();
        foreach($pl as $d){
            $pacijen[]=$d[0];
        }
        return $pacijen;
    }
    public function scopeNije($query,$param){
         if($param=='obrada' || $param=='pocetak' || $param=='konzilijum' || $param=='kraj'){
        return $this->pacient()->where($param,'=',null);
         }else{
              return $this->pacient()->whereHas('nastavak',function ($query) use ($param){
    $query->latest()->where($param,'=',null);
});
         }
    }
    public function scopeJeste($query,$param,$d,$e){
         if($param=='obrada' || $param=='pocetak' || $param=='konzilijum' || $param=='kraj'){
        return $this->pacient()->where($param,$d,null)->where($e,null);
         }else{
              return $this->pacient()->whereHas('nastavak',function ($query) use ($param,$d,$e){
    $query->latest()->where($param,$d,null)->where($e,null);
});
         }
    }
//  function test($nb){
//        return $this->pacient[0]->krug=$nb;
//    }
  
}
