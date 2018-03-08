<?php
if(isset(explode('/',Request::url())[7])){
$r=(explode('/',Request::url())[7]);
}

?>

@extends('template')
@section('sadrzaj')

<section id="team">
   
    <h1 style="text-align: center; margin-bottom: 30px;">Doktori</h1>
   
   <table class="table table-hover">
 
  <tbody>
      @foreach($doktori as $k=> $doktor)
    <tr>
        <th scope="row"><h4>{{ $k+1 }}</h4></th>
      <td><h4> <a style="color:#00017b" href="{{ url('doktori/doktor/'.$doktor->id) }}">{{ $doktor->name }} {{ $doktor->lastname }}</a></h4></td>
    
      <td><button  value="{{ $doktor->id }}" type="button" class="btn btn-primary izmeniDoktora" style="background: orange;">Izmeni</button></td>
      <td><button type="button" class="btn btn-primary" style="background: orangered;">Obrisi</button></td>
    
    </tr>
   @endforeach
  </tbody>
</table>
   
  
    <button id="dodajDoktora" type="button" class="btn btn-primary btn-lg">Dodaj doktora</button>
   
</section>
<div style="height: 500px;"></div>
@stop