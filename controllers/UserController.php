<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
//use Faker\Provider\Image;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function show(){
      $korisnici=User::all();  
     return view('korisnici',  compact('korisnici'));
    }
    function update($user){
        User::where('id',$user)->
                update(['rola_id'=>  request()->rola,
                       'doktor_id'=>  request()->rolaDoktor 
                        ]);
        return back();
    }
    function slika(Request $request){
//        $img= $request->file('slika');
//        $resize = Image::make($img)->resize(40, null, function ($constraint) { $constraint->aspectRatio(); } )
//  ->encode('jpg',80);;
//     Storage::disk('storage')->putFileAs('public/'.Auth::id(), $resize, Auth::id().'.jpg');
        \File::deleteDirectory('profile/' . Auth::id());
        \File::makeDirectory('profile/' . Auth::id(), $mode = 0777, true, true);
        \Image::make($request->file('slika'))->resize(180, 180)->save('profile/' . Auth::id() . '/' . Auth::id() . '.jpg');
       return redirect('/');
    }
}
