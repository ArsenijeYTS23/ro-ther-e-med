<?php
if(isset(explode('/',Request::url())[7])){
$r=(explode('/',Request::url())[7]);
}

?>

@extends('template')
@section('sadrzaj')

<section style="padding-bottom: 10px; margin-bottom: 0px;" id="team" ng-controller="customersCtrl1">
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
         <a style="color:#00017b" href="{{ url('doktori/doktor/'.$pacijent->doctor->id) }}"> {{ $pacijent->doctor->name }} {{ $pacijent->doctor->lastname }}</a>
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
            @if(isset($pacijent->obradjenZa))
           {{$pacijent->obradjenZa}}
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
     
     @if(isset($pacijent->kraj))
     <td>{{$pacijent->obradjenZa}}</td>
      
@elseif(isset($pacijent->primus))
<td>
    <a href="{{ url('primus') }}">Primus</a> &nbsp; {{ $pacijent->primus->vreme }}<br><br>
     @can('aparat',$pacijent)
     <a style="float: right;" href="{{ url('ukloniPrimus/'.$pacijent->id) }}"><span style="color: orangered;" class="glyphicon glyphicon-remove"></span></a>
    
 @endcan
</td>

@elseif(isset($pacijent->oncor))
<td>
    <a href="{{ url('oncor') }}">Oncor</a><br><br>
     @can('aparat',$pacijent)
     <a style="float: right;" href="{{ url('ukloniOncor/'.$pacijent->id) }}"><span style="color: orangered;" class="glyphicon glyphicon-remove"></span></a>

  @endcan
</td>
@elseif(isset($pacijent->elekta1))
<td>
    <a href="{{ url('elekta1') }}">Elekta 1</a><br><br>
    @can('aparat',$pacijent)
    <a style="float: right;" href="{{ url('ukloniElekta1/'.$pacijent->id) }}"><span style="color: orangered;" class="glyphicon glyphicon-remove"></span></a>
 
 @endcan
</td>
 @else
  
 <td>
     @can('aparat',$pacijent)
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Ubaci na aparat
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('primus/'.$pacijent->id) }}">Primus</a></li>
      <li role="presentation" ng-controller="aparatiCtrl"><a role="menuitem" tabindex="-1" ng-click="ubaciPac(2,5)" href="">Primus</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('oncor/'.$pacijent->id) }}">Oncor</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('elekta1/'.$pacijent->id) }}">Elekta1</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Elekta2</a></li>
    </ul>
  </div>

        @endcan    
      </td>
     
     @endif
    </tr>
    <tr>
        <td>Pomeranje</td>
        @if($pacijent->pomeranje)
        <td><a class="pomeranje1" href="#">
                @if($pacijent->pomeranje->pomeranje_x <> null)
            @if($pacijent->pomeranje->pomeranje_x > 0)
            levo {{$pacijent->pomeranje->pomeranje_x}} cm<br> 
            @else
            desno {{$pacijent->pomeranje->pomeranje_x}} cm<br> 
            @endif
                @endif
                 
                 @if($pacijent->pomeranje->pomeranje_y <> null)
            @if($pacijent->pomeranje->pomeranje_y > 0)
            ka glavi {{$pacijent->pomeranje->pomeranje_y}} cm<br> 
            @else
            ka nogama {{abs($pacijent->pomeranje->pomeranje_y)}} cm<br>
            @endif
                 @endif
                 
                  @if($pacijent->pomeranje->pomeranje_z <> null)
            @if($pacijent->pomeranje->pomeranje_z > 0)
            gore {{$pacijent->pomeranje->pomeranje_z}} cm<br> 
            @else
            dole {{$pacijent->pomeranje->pomeranje_z}} cm<br>
            @endif
                 @endif
            </a>
            <a style="float: right;" href="{{ url('pomeranje/obrisi/'.$pacijent->pomeranje->id) }}"><span style="color: orangered;" class="glyphicon glyphicon-remove"></span></a>
            
        </td>
        @else
             <td class="pomeranje1"  ><a  href="#">Ubaci pomeranje</a></td>
       @endif
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
     <button type="button" class="btn btn-primary" id="izmeni" value="{{ $pacijent->id }}">Izmeni</button>
    @endcan
    <hr style="background: gray; height: 2px;">
</section>


@if($pacijent->nastavak->first()!=null)
 @include('pacijent.nastavakBlade')
@endif
 @can('menja', $pacijent)
     <button type="button" style="float: right; background: orangered;" class="btn btn-primary" data-toggle="modal" data-target="#pacijentModal{{$pacijent->id}}">Arhiviraj</button>
   
    @if(isset($pacijent->kraj) && $pacijent->nastavak->first()==null)
    <div style="height:30px"></div>
    <button type="button" style="margin: auto; display:block; background: gray;" class="btn btn-primary" data-toggle="modal" data-target="#nastavakModal">Nastavak</button>
    @elseif(isset($nastavakKraj))
    <div style="height:30px"></div>
    <button type="button" style="margin: auto; display:block; background: gray;" class="btn btn-primary" data-toggle="modal" data-target="#nastavakModal">Nastavak</button>
   
    @endif
    @include('pacijent.dialog')
    @endcan

@if(isset($pacijent->kraj))
 @include('pacijent.nastavakForma')
@endif

@include('pacijent.pomeranje')
<div style="height: 100px;"></div>
@stop