<?php

namespace App\Http\Controllers;
use App\Primus;
use App\Oncor;
use Illuminate\Http\Request;

class AparatiController extends Controller
{
     function index(){
         
        $primus=Primus::with('pacient.pomeranje')->get();
        $oncor=Oncor::with('pacient.pomeranje')->get();
        $aparat=['primus'=>$primus,'oncor'=>$oncor];    
      
        return response()->json($aparat);
    }
//     function index($apa=1, $pac_id=0){
//         if($apa==1){
//        $primus1=Primus::where('vreme','<',14)->with('pacient.pomeranje')->get();
//        $primus2=Primus::where('vreme','>',13)->with('pacient.pomeranje')->get();
//        $aparat=['smena1'=> $primus1, 'smena2'=> $primus2, 'naslov'=>'Primus', 'pac_id'=>$pac_id];
//         }elseif($apa==2){
//        $oncor1=Oncor::where('vreme','<',14)->with('pacient.pomeranje')->get();
//        $oncor2=Oncor::where('vreme','>',13)->with('pacient.pomeranje')->get();
//        $aparat=['smena1'=> $oncor1, 'smena2'=> $oncor2, 'naslov'=>'Oncor', 'pac_id'=>$pac_id];    
//         }
//        return response()->json($aparat);
//    }
    
    
    
    
    
    
    
    
      function ubaciPacijenta($aparat,$id_vreme,$pacient){
          if($aparat==1){
        Primus::where('id',$id_vreme)->
                update(['pacient_id'=>$pacient]);
        return redirect(url('test_aparati#1'));
          }elseif($aparat==2){
        Oncor::where('id',$id_vreme)->
                update(['pacient_id'=>$pacient]);
        return redirect(url('test_aparati#2'));
          }
    }
    
    
    
    function ukloniPacijenta($aparat,$id){
        if($aparat==1){
        Primus::where('id',$id)->
               update(['pacient_id'=>0]);
                return redirect(url('test_aparati#1'));
        }else if($aparat==2){
          Oncor::where('id',$id)->
               update(['pacient_id'=>0]);  
                return redirect(url('test_aparati#2'));
        }
      
    }
}
