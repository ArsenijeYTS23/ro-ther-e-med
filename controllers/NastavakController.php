<?php

namespace App\Http\Controllers;
use App\Pacient;
use App\Localization;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Nastavak;

class NastavakController extends Controller
{
    function dodaj($pacijent){
      $nastavak=new Nastavak;
       $nastavak->diagnosas_id=request()->nastavakDiagnoza;
        $nastavak->pacient_id=$pacijent;
        $nastavak->nastavakObradjenZa=request()->nastavakObradjenZa;
           if(!empty(request()->nastavakKonzilijum)){
        $nastavak->nastavakKonzilijum=Carbon::parse( request()->nastavakKonzilijum);
         }else{
             $nastavak->nastavakKonzilijum=null;
         }
          if(!empty(request()->nastavakObrada)){
        $nastavak->nastavakObrada=Carbon::parse( request()->nastavakObrada);
          }else{
              $nastavak->nastavakObrada=null;
          }
         if(!empty(request()->nastavakPocetak)){
        $nastavak->nastavakPocetak=Carbon::parse( request()->nastavakPocetak);
         }else{
             $nastavak->nastavakPocetak=null;
         }
          if(!empty(request()->nastavakKraj)){
        $nastavak->nastavakKraj=Carbon::parse( request()->nastavakKraj);
          }else{
              $nastavak->nastavakKraj=null;
          }
    
        $nastavak->save();
        return back();
}
             function izmeni($id){
       if(!empty(request()->nastavakKonzilijum)){
            $konz=Carbon::parse( request()->nastavakKonzilijum);
        }else{
            $konz=null;
        }
        if(!empty(request()->nastavakObrada)){
            $obr=Carbon::parse( request()->nastavakObrada);
        }else{
            $obr=null;
        }
        if(!empty(request()->nastavakPocetak)){
            $poc=Carbon::parse( request()->nastavakPocetak);
        }else{
            $poc=null;
        }
        if(!empty(request()->nastavakKraj)){
            $kra=Carbon::parse( request()->nastavakKraj);
        }else{
            $kra=null;
        }
        Nastavak::where('id',$id)->
        update([
            'nastavakObradjenZa'=>request()->nastavakObradjenZa,
            'diagnosas_id'=>request()->nastavakDiagnoza,
            'nastavakKonzilijum'=>$konz,
            'nastavakObrada'=>$obr,
            'nastavakPocetak'=>$poc,
            'nastavakKraj'=>$kra,
            ]);
        return back();
    }
    function obrisi($id){
        Nastavak::destroy($id);
        return back();
    }

}
