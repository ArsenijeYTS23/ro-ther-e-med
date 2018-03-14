<?php

namespace App\Http\Controllers;
use App\Elekta1;
use Illuminate\Http\Request;

class Elekta1Controller extends Controller
{
   function index($id=0){
         $elekta11=Elekta1::where('vreme','<',14)->get();
        $elekta12=Elekta1::where('vreme','>',13)->get();
        return view('aparati.elekta1', compact('elekta11','elekta12','id'));
    }
      function ubaciElekta1($id, $vreme){
        Elekta1::where('id',$vreme)->
                update(['pacient_id'=>$id]);
        return redirect(url('elekta1'));
    }
    function ukloniElekta1($id){
        Elekta1::where('pacient_id',$id)->
               update(['pacient_id'=>0]);
        return back(); 
    }
}
