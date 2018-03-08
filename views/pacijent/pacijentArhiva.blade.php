<?php
if(isset(explode('/',Request::url())[7])){
$r=(explode('/',Request::url())[7]);
}

?>

@extends('template')
@section('sadrzaj')

<section id="team">
    <h1>{{ $pacijent->name }} {{ $pacijent->lastname }}  <small> &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $pacijent->karton }}</small></h1><br>
  <table class="table table-reflow">
 
  <tbody>
   
   
    <tr>
      <td>God rodjenja</td>
     
      <td>{{ $pacijent->godiste }}</td>
     
    </tr>
     <tr>
      <td>Mesto</td>
     
      <td>{{ $pacijent->mesto }}</td>
     
    </tr>
     <tr>
      <td>Telefon</td>
     
      <td>{{ $pacijent->telefon }}</td>
     
    </tr>
    <tr>
        <td>Datum konzilijuma</td>
        <td>
            @if($pacijent->konzilijum <> 0 && $pacijent->konzilijum <> null)
          {{ Carbon\Carbon::parse($pacijent->konzilijum)->format('d-m-Y')}}
           @endif
        </td>
    </tr>
    <tr>
      <td>Lokalizacija</td>
      @if(isset($pacijent->localization))
      <td>{{ $pacijent->localization->name }}</td>
      @else <td></td>
      @endif
    </tr>
    <tr>
      <td>Dijagnoza</td>
      @if(isset($pacijent->diagnosas))
      <td><b>{{ $pacijent->diagnosas->sifra }}</b><br> {{ $pacijent->diagnosas->naziv }}</td>
      @else <td></td>
      @endif
    </tr>
    <tr>
      <td>Zracenje</td>
      @if(isset($pacijent->odluka))
      <td>{{ $pacijent->odluka->name }}</td>
      @else <td></td>
      @endif
    </tr>
     <tr>
      <td>Doktor</td>
     
      <td>@if(isset($pacijent->doctor))
         <a href="{{ url('doktori/doktor/'.$pacijent->doctor->id) }}"> {{ $pacijent->doctor->name }} {{ $pacijent->doctor->lastname }}</a>
          @endif </td>
     
    </tr>
    <tr>
        <td>Datum obrade</td>
        <td>
             @if($pacijent->obrada <> 0 && $pacijent->obrada <> null)
          {{ Carbon\Carbon::parse($pacijent->obrada)->format('d-m-Y')}}
           @endif
        </td>
    </tr>
    <tr>
        <td>Obradjen za</td>
        <td>
            @if(isset($pacijent->obradjenZa) && $pacijent->obradjenZa<>0)
            @if($pacijent->obradjenZa==1)
            Primus
            @elseif($pacijent->obradjenZa==2)
            Oncor
            @else
            Elekta
            @endif
            @endif
        </td>
    </tr>
    
     <tr>
      <td>Napomena</td>
     
      <td><p>{{ $pacijent->napomena }}</p></td>
     
    </tr>
     <tr>
      <td>Beleske</td>
     
      <td><p>{{ $pacijent->beleske }}</p></td>
     
    </tr>
     <tr>
      <td>Aparat</td>
      <td>
            @if(isset($pacijent->obradjenZa) && $pacijent->obradjenZa<>0)
            @if($pacijent->obradjenZa==1)
            Primus
            @elseif($pacijent->obradjenZa==2)
            Oncor
            @else
            Elekta
            @endif
            @endif
        </td>
   
    </tr>
     <tr>
      <td>Pocetak zracenja</td>
      <td>{{ $pacijent->pocetak }}</td>
    </tr>
     <tr>
      <td>Kraj zracenja</td>
     
      <td>{{ $pacijent->kraj }}</td>
     
    </tr>
     
   
  </tbody>
</table>
   
    @can('menja', $pacijent)
    <button type="button" style="float: right; background: orange;" class="btn btn-primary" data-toggle="modal" data-target="#pacijentModal{{$pacijent->id}}">Reaktiviraj</button>
    @endcan
</section>
 <div class="modal fade" id="pacijentModal{{$pacijent->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upozorenje</h4>
        </div>
        <div class="modal-body">
          <p>Da li ste sigurni da hocete da reaktivirate pacijenta - {{ $pacijent->name }} {{ $pacijent->lastname }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="location.href='{{ url('pacijent/reaktiviraj/'.$pacijent->id) }}'">Da</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Ne</button>
        </div>
      </div>
      
    </div>
  </div>
<div style="height: 500px;"></div>
@stop