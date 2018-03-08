@extends('template')
@section('sadrzaj')
<section id="team" ng-controller="aparatiCtrl">
    <div style="position:relative; left: 400px; margin-bottom: 30px;">
        <a href="" ng-hide=" stat==1 " ng-mousedown="jedan_aparat(1, pac_id)" style="float: left; margin-right: 15px; color: maroon;  "><h3>PRIMUS</h3></a>
        <a href="" ng-hide=" stat==2 " ng-mousedown="jedan_aparat(2, pac_id)" style="float: left; margin-right: 15px; color: maroon;"><h3>ONCOR</h3></a>
        <a href="" ng-hide=" stat==3 " ng-mousedown="jedan_aparat(3)" style="float: left; margin-right: 15px; color: maroon;"><h3>ELECTA 1</h3></a>
        <a href="" ng-hide=" stat==4 " ng-mousedown="jedan_aparat(4)" style="float: left; margin-right: 15px; color: maroon;"><h3>ELECTA 2</h3></a>
       
        <div style="clear: both;"></div>
    </div>
    <h1 style="text-align: center;"><% naslov %></h1>
    <div class="row">
   
    <div class="col-sm-6">
        <div style="text-align: center;">
<h2>I smena</h2>
 </div>
        <table class="table table-hover">
            <tbody>
              
                <tr ng-repeat="x in aparati | filAparat:apa" ng-if="prvaSmena(x.vreme)">
<!--                <tr ng-repeat="x in aparati.smena1">-->
                    
                    <td><% x.vreme %></td>
                    <td><a id="div<%x.id%>" style="display:none;" ng-if="!x.pacient" ><% ubacivanje %></a>
                        <a class="class<%x.id%>" data-toggle='modal' data-target='#pacijentModal333' style="color: maroon;" ng-click="otvori(x.pacient.id)" href="" ng-if="x.pacient">
                       <% x.pacient.name +' '+ x.pacient.lastname %>
                        </a>
                     </td>
                   <td >
                       
                        <a  class="class<%x.id%>"  style="color: black;" href="#" ng-if="x.pacient.pomeranje" ng-click="pomeranje(x.pacient.id)">
                            pomeranje
                        </a>
                      
                    </td>
                        <td >
                            <a ng-if="!x.pacient && pac_id==0" href="{{ url('test#!/3') }}"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a>
                            <a ng-if="!x.pacient && pac_id!=0" href="" ng-click="ubaciPacijenta(apa,x.id,pac_id)"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a>
                            <a  class="class<%x.id%>" ng-if="x.pacient" href="" ng-click="ukloniPacijenta(apa,x.id)"><span style="color: orangered;" class="glyphicon glyphicon-remove"></span></a>
                        </td>
                </tr>
             
            </tbody>
        </table>
    </div>
        
        
        <div class="col-sm-6">
        <div style="text-align: center;">
<h2>II smena</h2>
 </div>
        <table class="table table-hover">
            <tbody>
              
                <tr ng-repeat="x in aparati | filAparat:apa" ng-if="drugaSmena(x.vreme)">
<!--                <tr ng-repeat="x in aparati.smena2">-->
                    <td><% x.vreme %></td>
                    <td ><a id="div<%x.id%>" style="display:none;" ng-if="!x.pacient" ><% ubacivanje %></a>
                        <a class="class<%x.id%>" data-toggle='modal' data-target='#pacijentModal333' style="color: maroon;" href=""  ng-click="otvori(x.pacient.id)" ng-if="x.pacient">
                            <% x.pacient.name +' '+ x.pacient.lastname %>
                        </a>
                     </td>
                   <td >
                       
                       <a class="class<%x.id%>" style="color: black;" href="#" ng-if="x.pacient.pomeranje" ng-click="pomeranje(x.pacient.id)">
                            pomeranje
                        </a>
                      
                    </td>
                        <td>
                            <a ng-if="!x.pacient && pac_id==0" href="test"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a>
                            <a ng-if="!x.pacient && pac_id!=0" href="" ng-click="ubaciPacijenta(apa,x.id,pac_id)"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a>
                            <a class="class<%x.id%>" ng-if="x.pacient" href="" ng-click="ukloniPacijenta(apa,x.id)"><span style="color: orangered;" class="glyphicon glyphicon-remove"></span></a>
                        </td>
                </tr>
             
            </tbody>
        </table>
    </div>
    
    </div>
    
    
    
     @include('testdialog')
     @include('testPacientUpdate')
     @include('testPomeranje')
     @include('testAparatiPomeranje')
    
</section>





@stop

