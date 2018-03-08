<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diagnosa;


class DiagnosaController extends Controller
{
     function dijagnoze(){
         $dijagnoza=Diagnosa::get();
        $dijagnoza=$dijagnoza->sortBy('naziv');
        return view('dijagnoze', compact('dijagnoza'));
    }
    function dijagnozaSave(){
         $dijagnoza=new Diagnosa;
        $dijagnoza->sifra=request()->sifra;
        $dijagnoza->naziv=request()->naziv;
        $dijagnoza->save();
        return back();
    }
    function dijagnozaUpdate(Diagnosa $dijagnoza){
        Diagnosa::
            where('id', $dijagnoza->id)
            ->update(['sifra' => request()->sifra, 'naziv' => request()->naziv]);
        return back();
    }
    function delete($id){
        Diagnosa::
                where('id', $id)
                ->delete();
        return back();
    }
}
