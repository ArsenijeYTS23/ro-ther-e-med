<?php
namespace App\Http\Controllers;
use App\Pacient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Doctor;
class DoctorController extends Controller
{
    function lista(){
        $doktori=  Doctor::all();
 
        return view('listaDoktora',compact('doktori'));
    }
    
            function drLista(Doctor $doktor, $status='svi_pacijenti'){
           $naj= DoctorController::sortiraj('name');
           DoctorController::check(collect($naj[0]),'localizationlike');
           $klj=[3,2,1];
           foreach($klj as $k){
               $z[]=$naj[$k-1];
           }
           if (count($klj)==2){
             return  collect(array_merge($z[0]->toArray(),$z[1]->toArray()))->sortByDesc('id')->values()->take(6); 
           }elseif(count($klj)==1){
                return  collect($z[0])->sortByDesc('id')->values()->take(6); 
           }else{
               return  collect(array_merge($z[0]->toArray(),$z[1]->toArray(),$z[2]->toArray()))->sortByDesc('id')->values()->take(9);  
           }    
           $paci=Pacient::with('nastavak')->has('nastavak')->get();

        foreach($pac as $p){
        if($p->doctor->where('id',1)->first()){
            $p->checked=1;
        }else{
             $p->checked=null;
        }
        }
        return $pac[0];
        
        
        
        
        $doc=Doctor::all();
        return collect(array_merge($pac->toArray(),$doc->toArray()))->sortBy('name')->values();
          
    foreach($paci as $p){
        if($p->nastavak->last()!=null){
         $t[]=$p->nastavakZadnji;
    }
    }
     foreach($t as $w){
        $qw[]=$w[0];
    }
    $va= collect($qw)->where('nastavakKraj',null);
    return $va[0]->pacient;
    
          if($status=='na_cekanju'){
            $pacient=$doktor
                    ->nijeObradjen()
                    ->get();
                   
        }elseif ($status=='u_proceduri') {
            
            $pac=$doktor
                    ->jeste('obrada','<>','pocetak')
                    ->nijePoceo()
                   ->doesntHave('nastavak')
                    ->get();
            $pacpal=$doktor  
                  //  ->nije('nastavakPocetak')
                     ->obradjen('nastavakObrada','nastavakPocetak')
                   // ->has('nastavak')
                    ->get();
            return $pacpal;
              $svi=[$pac,$pacpal];
             foreach($svi as $s){
                 foreach($s as $d){
                     $pacijentii[]=$d;
                 }
             }
             return DoctorController::doda($pacijentii,'konzilijum');
                        
        }elseif ($status=='na_zracenju') {
            $pacient=$doktor
                    ->poceo()
                    ->nijeZavrsio()
                    ->get();
        }elseif ($status=='palijacije') {
      return  $pacient= $doktor
                   ->palijacija();
        }else{
  return   $pacient=$doktor
          ->pacient()
          ->whereHas('nastavakZadnji',function ($query){
    $query->where('nastavakObrada', '<>', null)->where('nastavakPocetak',null);
})
    //      ->nastavakZadnji()
          ->get()
         
         // ->dodatak()
          ;
        }
         return view('drLista', compact('doktor','pacient','status'));
    }
    
     function save(){
        $doktor=new Doctor;
        $doktor->name=request()->drName;
        $doktor->lastname=request()->drLastname;
        $doktor->save();
        return back();
    }
    function update($doktor){
        Doctor::where('id',$doktor)->
        update(['name'=>request()->drName,
            'lastname'=> request()->drLastname,
             ]);
        return back();
    }
    static function doda($n,$re){
         foreach($n as $p){
            if($p->nastavak->last()!=null){
                $t[]=[$p,$p->nastavak->last()->nastavakKonzilijum];
            }else{
               $t[]=[$p,$p->$re];
            }
        }
        $pl= collect($t)->sortBy(1)->values();
        foreach($pl as $d){
            $pacijen[]=$d[0];
        }
        return $pacijen;
    }
      static function sortiraj($subj){
                $pacients=Pacient::all();
                foreach($pacients as $pacient){
                    $pa[]=$pacient->localization;
                    $pac[]=$pacient;
                }
           
                 $pa= collect($pa)->sortByDesc($subj)->unique('id')->values()->take(2);
                 $pac= collect($pac)->sortByDesc($subj)->unique('id')->values()->take(2);
                 
                 $doctors=Doctor::all();
                 
                foreach($doctors as $doctor){
                    $doc[]=$doctor;
                }
                $doc= collect($doc)->sortByDesc($subj)->values()->take(3);
                
                return $najn=[$pa,$pac,$doc];
                
              return  $najnovije=collect(array_merge($pa->toArray(),$pac->toArray(),$doc->toArray()))->sortByDesc($subj)->values()->take(6);
               
                
                }
           static     function check($subj,$obj){
                    foreach($subj as $s){
                        if($s->$obj->where('user_id',Auth::id())->first()){
                            $s->checked=1;
                        }else{
                            $s->checked=null;
                        }
                    }
                    return $subj;
                }
    
}
