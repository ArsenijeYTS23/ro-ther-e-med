<?php //
//if(isset(explode('/',Request::url())[8])){
//$r=(explode('/',Request::url())[8]);
//
//}

?>

@extends('template')
@section('sadrzaj')

<section id="team">
  
    
    
   <h1 style="text-align: center; margin-bottom: 30px;">{{ $doktor->name }} {{ $doktor->lastname }}</h1>
     <div style="margin-bottom: 30px;">
        <a href="{{url('doktori/doktor/'.$doktor->id.'/svi_pacijenti')}}"><button style="float: left; margin-right: 15px; <?php if($status=='svi_pacijenti'){ echo 'background: black';}else{ echo "";} ?>"  type="button" class="btn btn-warning" >Svi pacijenti</button></a>
        <a href="{{url('doktori/doktor/'.$doktor->id.'/na_cekanju')}}"><button style="float: left; margin-right: 15px; <?php if($status=='na_cekanju'){ echo 'background: black';}else{ echo "";} ?>"  type="button" class="btn btn-warning" >Lista cekanja</button></a>
        <a href="{{url('doktori/doktor/'.$doktor->id.'/u_proceduri')}}"><button style="float: left; margin-right: 15px; <?php if($status=='u_proceduri'){ echo 'background: black';}else{ echo "";} ?>"  type="button" class="btn btn-warning" >U proceduri</button></a>
        <a href="{{url('doktori/doktor/'.$doktor->id.'/na_zracenju')}}"><button style="float: left; margin-right: 15px; <?php if($status=='na_zracenju'){ echo 'background: black';}else{ echo "";} ?>"  type="button" class="btn btn-warning" >Na zracenju</button></a>
        <a href="{{url('doktori/doktor/'.$doktor->id.'/palijacije')}}"><button style="float: left; margin-right: 15px; <?php if($status=='palijacije'){ echo 'background: black';}else{ echo "";} ?>"  type="button" class="btn btn-warning" >Palijacije</button></a>
      
       
       
        <div style="clear: both;"></div>
    </div>
 <table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Ime i prezime</th>
      <th>Lokalizacija</th>
     
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