<?php

namespace App\Http\Controllers;
use App\Primus;
use Illuminate\Http\Request;

class PrimusController extends Controller
{
     function index($id=0){
     //  return response()->json (Primus::with('pacient.pomeranje')->get());
        $primus1=Primus::where('vreme','<',14)->get();
        $primus2=Primus::where('vreme','>',13)->get();
        return view('aparati.primus', compact('primus1','primus2','id'));
    }
      function ubaciPrimus($id, $vreme){
        Primus::where('id',$vreme)->
                update(['pacient_id'=>$id]);
        return redirect(url('primus'));
    }
    function ukloniPrimus($id){
        Primus::where('pacient_id',$id)->
               update(['pacient_id'=>0]);
        return back(); 
    }
}
