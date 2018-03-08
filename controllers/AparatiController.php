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
