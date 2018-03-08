<?php

namespace App\Http\Controllers;
use App\Oncor;
use Illuminate\Http\Request;

class OncorController extends Controller
{
      function index($id=0){
     //   return Pacient::all()[1]->primus;
        $oncor1=Oncor::where('vreme','<',14)->get();
        $oncor2=Oncor::where('vreme','>',13)->get();
        return view('aparati.oncor', compact('oncor1','oncor2','id'));
    }
    function ubaciOncor($id, $vreme){
        Oncor::where('id',$vreme)->
                update(['pacient_id'=>$id]);
        return redirect(url('oncor'));
    }
     function ukloniOncor($id){
        Oncor::where('pacient_id',$id)->
               update(['pacient_id'=>0]);
        return back(); 
    }
}
