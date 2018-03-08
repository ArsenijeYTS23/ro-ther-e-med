<?php
namespace App\Http\Controllers;
use App\Pacient;
use App\Localization;
use App\Nastavak;
use App\Pomeranje;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class PacientTestController extends Controller
{
   function nadji () {
  $pacient=Pacient::with('localization')->get();
  $lokalizacija=Localization::all();
 return response()->json([$pacient,$lokalizacija]);
    
}
function lokalizacija ($lok) {
    if($lok==0){
    $pacient=Pacient::with('localization')->get();    
    }else{
  $pacient=Pacient::where('localization_id',$lok)
          ->with('localization')
          ->get();
  }
  $lokalizacija=Localization::all();
 return response()->json([$pacient,$lokalizacija]);
    
}

function status () {
      $lokalizacija=Localization::all();
    $pacient=Pacient::with('localization')
                     ->with('doctor')
                     ->with('primus')
                     ->with('oncor')
                     ->with('elekta1')
                     ->get(); 
          return response()->json([$lokalizacija,$pacient]);
    
}

function otvori($id) {
     if(Auth::user()){
    $user=Auth::user();
    }else{
        $user=0;
    }
    $dijagnoza=\App\Diagnosa::all();
    $doktor=  \App\Doctor::all();
    $odluka=  \App\Odluka::all();
  $pacient=Pacient::where('id',$id)
          ->with('localization')
          ->with('diagnosas')
          ->with('primus')
          ->with('oncor')
          ->with('odluka')
          ->with('doctor')
          ->with('pomeranje')
          ->first();
 
 return response()->json([$pacient,$user,$dijagnoza,$doktor,$odluka]);
    
}
 public function pacijentUpdate($pacijent){
      if(!empty(request()->konzilijum)){
            $konz=Carbon::parse( request()->konzilijum);
        }else{
            $konz=null;
        }
      if(!empty(request()->obrada)){
            $obr=Carbon::parse( request()->obrada);
        }else{
            $obr=null;
        }
      if(!empty(request()->pocetak)){
            $poc=Carbon::parse( request()->pocetak);
        }else{
            $poc=null;
        }
      if(!empty(request()->kraj)){
            $kraj=Carbon::parse( request()->kraj);
        }else{
            $kraj=null;
        }
        Pacient::where('id',$pacijent)->
        update(['name'=>request()->name,
            'lastname'=> request()->lastname,   
            'mesto'=> request()->mesto,    
            'karton'=> request()->karton,   
            'godiste'=> request()->godiste,    
            'telefon'=> request()->telefon,   
            'diagnosas_id'=> request()->diagnoza,    
            'doctor_id'=> request()->doktor,   
            'localization_id'=> request()->lokalizacija,    
            'odluka_id'=> request()->odluka,   
            'konzilijum'=> $konz,    
            'obrada'=> $obr,   
            'obradjenZa'=> request()->obradjenZa,    
            'pocetak'=> $poc,    
            'kraj'=>$kraj,   
            'napomena'=> request()->napomena,    
            'beleske'=> request()->beleske  
             ]);
        return back();
    }
}
