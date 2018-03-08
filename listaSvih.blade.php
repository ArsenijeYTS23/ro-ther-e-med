<?php
if(isset(explode('/',Request::url())[7])){
$r=(explode('/',Request::url())[7]);
}


?>

@extends('template')
@section('sadrzaj')

<section id="team">
    
      
    <div style="position:relative; left: 400px; margin-bottom: 30px;">
        <a href="{{ url('lista/svi_pacijenti')}}" style="float: left; margin-right: 15px; color: black;<?php if($naslov=='Svi pacijenti'){ echo 'display: none'; } ?>">Svi pacijenti</a>
        <a href="{{ url('lista/lista_cekanja')}}" style="float: left; margin-right: 15px; color: black;<?php if($naslov=='Lista cekanja'){ echo 'display: none'; } ?>">Lista cekanja</a>
        <a href="{{ url('lista/pacijenti_u_proceduri')}}" style="float: left; margin-right: 15px; color: black;<?php if($naslov=='Pacijenti u proceduri'){ echo 'display: none'; } ?>">Pacijenti u proceduri</a>
        <a href="{{ url('lista/pacijenti_na_zracenju')}}" style="float: left; margin-right: 15px; color: black;<?php if($naslov=='Pacijenti na zracenju'){ echo 'display: none'; } ?>">Pacijenti na zracenju</a>
       
        <div style="clear: both;"></div>
    </div>
    <h1 style="text-align: center; margin-bottom: 30px;">{{ $naslov }}</h1>
    <div class="form-group" style="position:relative; left:800px;">  
        <form class="form-inline"  method="get" action="{{url('lista/'.$url.'/'.$lokal.'/1')}}">
            <select class="form-control" style="width:100px;"  name="sortby">
                 <option value=""></option>
                 <option value="mesto" {!! ($sortBy=='mesto') ? 'selected': '' !!}>mesto</option>
                 <option value="name" {!! ($sortBy=='name') ? 'selected': '' !!}>ime</option>
                 <option value="lastname" {!! ($sortBy=='lastname') ? 'selected': '' !!}>prezime</option>
                 <option value="karton" {!! ($sortBy=='karton') ? 'selected': '' !!}>karton</option>
             </select>
            @if($sort<>0)
            <input class="form-control" style="width:200px;"  type="text" name="naziv" value="{{ $naziv }}" > 
            @else
            <input class="form-control" style="width:200px;"  type="text" name="naziv" > 
            @endif
             <button  class="btn btn-primary"> <span class="glyphicon glyphicon-search"></span> Search</button>
         </form>  
     </div>
    <div style="margin-bottom: 30px;">
        <a href="{{url('lista/'.$url)}}"><button style="float: left; margin-right: 15px; <?php if(!isset($r)){ echo 'background: black';}else{ echo "";} ?>"  type="button" class="btn btn-warning" >Svi pacijenti</button></a>
      @if(!empty($lok))
        @foreach($lok as $lokalizacija)
        <a href="{{url('lista/'.$url.'/'.$lokalizacija->id)}}"> <button style="float: left; margin-right: 15px; <?php if(isset($r) && $r==$lokalizacija->id){ echo 'background: black';}else{ echo "";} ?>" type="button" class="btn btn-warning" >{{ $lokalizacija->name }}</button></a>
        @endforeach
        @endif
        <div style="clear: both;"></div>
    </div>
 <table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Ime i prezime</th>
      <th>Lokalizacija</th>
      <th>Doktor</th>
      <th>Datum konzilijuma</th>
      <th>Datum obrade</th>
  
     
    </tr>
  </thead>
  <tbody>
      @foreach($pacient as $k=>$pac)
    <tr>
  
      <th scope="row">{{ $k+1 }}</th>
      <td><a style="color:#00017b" href="{{ url('pacijent/'.$pac->id) }}">{{ $pac->name }} {{ $pac->lastname }}</a></td>
      <td>@if(isset($pac->localization))
          {{ $pac->localization->name }}
     @endif 
      </td>
      <td>@if(isset($pac->doctor))<a style="color:#00017b" href="{{ url('doktori/doktor/'.$pac->doctor->id) }}">
          {{ $pac->doctor->name }} {{ $pac->doctor->lastname }}
     
          </a> @endif</td>
      <td>@if($pac->konzilijum <> 0)
          {{ Carbon\Carbon::parse($pac->konzilijum)->format('d-m-Y')}}
           @endif
      </td>
      <td>@if($pac->obrada <> 0)
          {{ Carbon\Carbon::parse($pac->obrada)->format('d-m-Y')}}
           @endif
      </td>
  
    </tr>
  
   @endforeach
  </tbody>
</table>
</section>
<div style="height: 500px;"></div>
@stop