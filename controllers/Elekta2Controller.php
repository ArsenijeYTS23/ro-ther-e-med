<?php

namespace App\Http\Controllers;
use App\Elekta2;
use Illuminate\Http\Request;

class Elekta2Controller extends Controller
{
   function index($id=0){
        $elekta21=Elekta2::where('vreme','<',14)->get();
        $elekta22=Elekta2::where('vreme','>',13)->get();
        return view('aparati.elekta2', compact('elekta21','elekta22','id'));
    }
      function ubaciElekta2($id, $vreme){
        Elekta2::where('id',$vreme)->
                update(['pacient_id'=>$id]);
        return redirect(url('elekta2'));
    }
    function ukloniElekta2($id){
        Elekta2::where('pacient_id',$id)->
               update(['pacient_id'=>0]);
        return back(); 
    }
}
