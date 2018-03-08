<?php

namespace App\Http\Controllers;
use App\Pacient;
use App\Localization;
use App\Nastavak;
use App\Pomeranje;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class PacientController extends Controller
{
      public function save()
    {
        $pacient=new Pacient;
        $pacient->name=request()->name;
        $pacient->lastname=request()->lastname;
        $pacient->karton=request()->karton;
        $pacient->godiste=request()->godiste;
        $pacient->mesto=request()->mesto;
        $pacient->napomena=request()->napomena;
        $pacient->beleske=request()->beleska;
        $pacient->telefon=request()->telefon;
        $pacient->obradjenZa=request()->obradjenZa;
        $pacient->localization_id=request()->lokalizacija;
        $pacient->odluka_id=request()->odluka;
        $pacient->doctor_id=request()->doktor;
        $pacient->diagnosas_id=request()->diagnoza;
         if(!empty(request()->konzilijum)){
        $pacient->konzilijum=Carbon::parse( request()->konzilijum);
         }else{
             $pacient->konzilijum=null;
         }
          if(!empty(request()->obrada)){
        $pacient->obrada=Carbon::parse( request()->obrada);
          }else{
              $pacient->obrada=null;
          }
         if(!empty(request()->pocetak)){
        $pacient->pocetak=Carbon::parse( request()->pocetak);
         }else{
             $pacient->pocetak=null;
         }
          if(!empty(request()->kraj)){
        $pacient->kraj=Carbon::parse( request()->kraj);
          }else{
              $pacient->kraj=null;
          }
        $pacient->obradjenZa=request()->obradjenZa;
        $pacient->save();
        return back();
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
            $kra=Carbon::parse( request()->kraj);
        }else{
            $kra=null;
        }
        Pacient::where('id',$pacijent)->
        update(['name'=>request()->name,
            'lastname'=> request()->lastname,
            'godiste'=>request()->godiste,
            'karton'=>request()->karton,
            'mesto'=>request()->mesto,
            'napomena'=>request()->napomena,
            'beleske'=>request()->beleska,
            'telefon'=>request()->telefon,
            'obradjenZa'=>request()->obradjenZa,
            'diagnosas_id'=>request()->diagnoza,
            'doctor_id'=>request()->doktor,
            'localization_id'=>request()->lokalizacija,
            'konzilijum'=>$konz,
            'obrada'=>$obr,
            'pocetak'=>$poc,
            'kraj'=>$kra,
            ]);
        return back();
    }
    
    function pacijentDelete(Pacient $pacijent){
         $pacijent->delete();
          return redirect('pacijentArhiva/'.$pacijent->id);
        
    }
    function pacijentReaktiviraj($pacijent){
         Pacient::onlyTrashed()->where('id',$pacijent)->restore();
          return redirect('pacijent/'.$pacijent);
        
    }
            
     function pacijent(Pacient $pacijent){
          if(isset($pacijent->nastavak->last()->nastavakKraj)){
         $nastavakKraj= $pacijent->nastavak->last()->nastavakKraj;
         }else{
            $nastavakKraj=null; 
         }
        return view('pacijent.pacijent', compact('pacijent','nastavakKraj'));
    }
     function pacijentArhiva($pacijent){
          $pacijent = Pacient::onlyTrashed()
                ->where('id', $pacijent)
                ->first();
          
        return view('pacijent.pacijentArhiva', compact('pacijent'));
    }
    
   function svi($lokal=0, $sort=0){
         $naslov='Svi pacijenti';
        $url='svi_pacijenti';
        if($sort<>0){
           $naziv=request()->naziv;
           $sortBy=request()->sortby;
           if($naziv=='' || $sortBy==''){
              $sort=0;
           }
        }else{
            $naziv='';
            $sortBy='';
        }
        if($lokal<>0 && $sort==0){
            $pacient=Pacient::
                    lokalizacija($lokal)
                    ->get()
                    ->sortBy('konzilijum');
        }elseif ($lokal<>0 && $sort<>0) {
           
            $pacient=  Pacient::
                    lokalizacija($lokal)
                    ->filter($sortBy,$naziv)
                    ->get()
                     ->sortBy('konzilijum');
        }elseif ($lokal==0 && $sort<>0) {
            $pacient=  Pacient::
                    filter($sortBy,$naziv)
                    ->get()
                     ->sortBy('konzilijum');
         }
        else{
            $pacient=Pacient::all()->sortBy('konzilijum');
        }
         $lok=Localization::all();
         return view('listaSvih',compact('pacient','lok','naslov','url','lokal','naziv','sortBy','sort'));
}

  function cekanje($lokal=0, $sort=0){
        $naslov='Lista cekanja';
        $url='lista_cekanja';
         if($sort<>0){
           $naziv=request()->naziv;
           $sortBy=request()->sortby;
           if($naziv=='' || $sortBy==''){
              $sort=0;
           }
        }else{
            $naziv='';
            $sortBy='';
        }
        if($lokal<>0 && $sort==0){
            $pacient=Pacient::konzilijum()
                   ->nijeObradjen()
                    ->lokalizacija($lokal)
                    ->get();
        }elseif ($lokal<>0 && $sort<>0) {
             $pacient=Pacient::konzilijum()
                    ->nijeObradjen()
                    ->lokalizacija($lokal)
                     ->filter($sortBy,$naziv)
                    ->get();
        }elseif ($lokal==0 && $sort<>0) {
             $pacient=Pacient::
                     konzilijum()
                     ->nijeObradjen()
                     ->filter($sortBy,$naziv)
                     ->get();
        }
        else{
        $pacient=Pacient::
                konzilijum()
                ->nijeObradjen()
                ->get();
        }
         $lok=Localization::all();
        // return $pacient;
         return view('listaSvih',compact('pacient','lok','naslov','url','lokal','naziv','sortBy','sort'));
    }
       function procedura($lokal=0, $sort=0){
        $naslov='Pacijenti u proceduri';
        $url='pacijenti_u_proceduri';
         if($sort<>0){
           $naziv=request()->naziv;
           $sortBy=request()->sortby;
           if($naziv=='' || $sortBy==''){
              $sort=0;
           }
        }else{
            $naziv='';
            $sortBy='';
        }
        if($lokal<>0 && $sort==0){
            $pacient=Pacient::
                    obradjen()
                    ->nijePoceo()
                    ->lokalizacija($lokal)
                    ->get();
        }elseif ($lokal<>0 && $sort<>0) {
            $pacient=Pacient::
                     obradjen()
                     ->nijePoceo()
                     ->lokalizacija($lokal)
                     ->filter($sortBy,$naziv)
                     ->get();
        }elseif ($lokal==0 && $sort<>0) {
            $pacient=Pacient::
                    obradjen()
                    ->nijePoceo()
                    ->filter($sortBy,$naziv)
                    ->get();
        }
        else{
        $pacient=Pacient::
                obradjen()
                ->nijePoceo()
                ->get();
        }
         $lok=Localization::all();
         return view('listaSvih',compact('pacient','lok','naslov','url','lokal','naziv','sortBy','sort'));
    }
       function zracenje($lokal=0, $sort=0){
        $naslov='Pacijenti na zracenju';
        $url='pacijenti_na_zracenju';
         if($sort<>0){
           $naziv=request()->naziv;
           $sortBy=request()->sortby;
           if($naziv=='' || $sortBy==''){
              $sort=0;
           }
        }else{
            $naziv='';
            $sortBy='';
        }
        if($lokal<>0 && $sort==0){
            $pacient=Pacient::
                    poceo()
                    ->nijeZavrsio()
                    ->lokalizacija($lokal)
                    ->get();
        }elseif ($lokal<>0 && $sort<>0) {
            $pacient=Pacient::
                     poceo()
                    ->nijeZavrsio()
                    ->lokalizacija($lokal)
                    ->filter($sortBy,$naziv)
                    ->get();
        }elseif ($lokal==0 && $sort<>0) {
            $pacient=Pacient::
                     poceo()
                    ->nijeZavrsio()
                    ->filter($sortBy,$naziv)
                    ->get();
        }
        else{
        $pacient=Pacient::
                poceo()
                ->nijeZavrsio()
                ->get();
        }
         $lok=Localization::all();
         return view('listaSvih',compact('pacient','lok','naslov','url','lokal','naziv','sortBy','sort'));
    }
    function arhiva($lokal=0, $sort=0){
         $naslov='Arhiva';
        $url='arhiva';
        if($sort<>0){
           $naziv=request()->naziv;
           $sortBy=request()->sortby;
           if($naziv=='' || $sortBy==''){
              $sort=0;
           }
        }else{
            $naziv='';
            $sortBy='';
        }
        if($lokal<>0 && $sort==0){
            $pacient= Pacient::onlyTrashed()
                    ->lokalizacija($lokal)
                    ->get();
        }elseif($lokal<>0 && $sort<>0){
             $pacient= Pacient::onlyTrashed()
                    ->lokalizacija($lokal)
                    ->where($sortBy,'LIKE',"%$naziv%")
                    ->get();
        }elseif($lokal==0 && $sort<>0){
             $pacient= Pacient::onlyTrashed()
                    ->where($sortBy,'LIKE',"%$naziv%")
                    ->get();
        } else{
        $pacient= Pacient::onlyTrashed()->get();
        }
         $lok=Localization::all();
        return view('arhiva', compact('pacient','lok','naslov','url','lokal','naziv','sortBy','sort'));
    }
    function slika(){
        
    }
   

}
