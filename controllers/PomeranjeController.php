<?php

namespace App\Http\Controllers;
use App\Pomeranje;
use App\Pacient;
use Illuminate\Http\Request;

class PomeranjeController extends Controller
{
   function make($pacijent){
      
      $pomeranje=new Pomeranje;
       $pomeranje->pomeranje_x=request()->pomeranje_x;
       $pomeranje->pomeranje_y=request()->pomeranje_y;
       $pomeranje->pomeranje_z=request()->pomeranje_z;
       $pomeranje->pacient_id=$pacijent;
       $pomeranje->save();
       return back(); 
   }
   function update($pomeranje){
    //   return $pomeranje;
         Pomeranje::where('id',$pomeranje)->
        update(['pomeranje_x'=>request()->pomeranje_x,
            'pomeranje_y'=> request()->pomeranje_y,
            'pomeranje_z'=>request()->pomeranje_z,
              ]);
        return back();
   }
   function delete($pomeranje){
    //   return $nastavak;
        Pomeranje::destroy($pomeranje);
        return back();
   }
}
