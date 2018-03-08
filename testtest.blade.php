<?php
if(isset(explode('/',Request::url())[7])){
$r=(explode('/',Request::url())[7]);
}


?>

@extends('template')
@section('sadrzaj')

<section id="team" ng-controller="customersCtrl1">
      
    <div style="position:relative; left: 400px; margin-bottom: 30px;">
        <a href="" ng-hide=" stat==1 " ng-mousedown="status(1)" style="float: left; margin-right: 15px; color: black;  " >Svi pacijenti</a>
        <a href="" ng-hide=" stat==2 " ng-mousedown="status(2)" style="float: left; margin-right: 15px; color: black;">Lista cekanja</a>
        <a href="" ng-hide=" stat==3 " ng-mousedown="status(3)" style="float: left; margin-right: 15px; color: black;">Pacijenti u proceduri</a>
        <a href="" ng-hide=" stat==4 " ng-mousedown="status(4)" style="float: left; margin-right: 15px; color: black;">Pacijenti na zracenju</a>
       
        <div style="clear: both;"></div>
    </div>
    
    
    
    
    <h1 style="text-align: center; margin-bottom: 30px;"><% naslov %></h1>
    
     <div class="form-group" style="position:relative; left:800px;">  
        <form class="form-inline" >
            
           
            <input class="form-control" style="width:200px;"  type="text" ng-model="test" name="naziv" > 
          
            <button class="btn btn-primary" ng-click="test=''"> <span class="glyphicon glyphicon-search"></span> Resetuj</button>
        </form>
     </div>
    
    
    
    <div style="margin-bottom: 30px;">
        <a href="" ng-click="status(stat,0)"><button ng-style="0===lok && { 'background' : 'black' }" style="float: left; margin-right: 15px; "  type="button" class="btn btn-warning" >Svi pacijenti</button></a>
     
        <a href="" ng-mousedown="status(stat,x.id); "  ng-repeat="x in localization"> <button ng-style="x.id===lok && { 'background' : 'black' }" style="float: left; margin-right: 15px; " type="button" class="btn btn-warning" ><% x.name %></button></a>
        
        <div style="clear: both;"></div>
    </div>
 <table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Ime i prezime</th>
      <th>Lokalizacija</th>
      <th>Doktor</th>
      <th ng-if="stat==1 || stat==2">Datum konzilijuma</th>
      <th ng-if="stat==1 || stat==3">Datum obrade</th>
      <th ng-if="stat==1 || stat==4">Datum pocetka</th>
      <th>Aparat</th>
  
     
    </tr>
  </thead>
  <tbody>
     
      <tr ng-repeat="y in pacient| fil:stat:lok|  filter:test">
  
      <th scope="row"><% 1+$index %>.</th>
      <td><a style="color:#00017b" href="" id="rrr" ng-click="otvori(y.id)" data-toggle='modal' data-target='#pacijentModal333'><% y.name +" "+y.lastname %></a></td>
      <td><% y.localization.name %></td>
      <td><a style="color:maroon" href="">
         <% y.doctor.name+ ' '+y.doctor.lastname %>
     
          </a> </td>
      <td ng-if="stat==1 || stat==2">
          <% y.konzilijum | date :  "dd.MM.y" %>
      </td>
      <td ng-if="stat==1 || stat==3">
           <% y.obrada | date :  "dd.MM.y" %>
      </td>
      <td ng-if="stat==1 || stat==4">
           <% y.pocetak | date :  "dd.MM.y" %>
      </td>
      <td>
<!--           <% y.primus ? 'Primus' : y.oncor ? 'Oncor': "" %>-->
          <a style="color: #7a6007" href="{{ url('test_aparati#!2') }}" ng-if="y.primus"  >Primus</a>
          <a style="color: #7a6007" href="{{ url('test_aparati#!2') }}" ng-if="!y.primus && y.oncor"  >Oncor</a>
      </td>
  
    </tr>
  
  
  </tbody>
</table>
    @include('testdialog')
    @include('testPacientUpdate')
    @include('testPomeranje')
</section>

<div style="height: 500px;"></div>
@stop