<?php
if(isset(explode('/',Request::url())[7])){
$r=(explode('/',Request::url())[7]);
}

?>

@extends('template')
@section('sadrzaj')

<section id="team">
   
    <h1 style="text-align: center; margin-bottom: 30px;">Korisnici</h1>
   
   <table class="table table-hover">
 
  <tbody>
      @foreach($korisnici as $k=> $kor)
    <tr>
        <th scope="row"><h4>{{ $k+1 }}</h4></th>
      <td><h4>{{ $kor->name }} {{ $kor->lastname }}</h4></td>
      @if(isset($kor->rola))
      <td>{{ $kor->rola->name }}</td>
     @endif
      <td><button  value="{{ $kor->id }}" type="button" class="btn btn-primary izmeniUsera" style="background: orange;">Izmeni</button></td>
      <td><button type="button" class="btn btn-primary" style="background: red;">Obrisi</button></td>
    
    </tr>
   @endforeach
  </tbody>
</table>
   
  
   
   
</section>
<div style="height: 500px;"></div>
@stop