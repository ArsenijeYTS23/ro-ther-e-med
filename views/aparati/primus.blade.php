@extends('template')
@section('sadrzaj')
<section id="team" ng-controller="customersCtrl1">
    <h1 style="text-align: center;">PRIMUS</h1>
    <div class="row">
   
    <div class="col-sm-6">
        <div style="text-align: center;">
<h2>I smena</h2>
 </div>
        <table class="table table-hover">
            <tbody>
                @foreach($primus1 as $prim)
                <tr>
                    <td>{{ $prim->vreme }}</td>
                    <td>
                        @if(isset($prim->pacient))
                        <a style="color: maroon;" href="{{ url('pacijent/'.$prim->pacient->id) }}">
                        {{ $prim->pacient->name }} {{ $prim->pacient->lastname }}
                        </a>
                        @endif
                    </td>
                     <td>
                        @if($prim->pacient && $prim->pacient->pomeranje)
                        <a class="pomeranje2" id="move{{$prim->pacient->pomeranje->id}}" style="color: black;" href="#">
                            pomeranje <span id="ime{{$prim->pacient->pomeranje->id}}" style="display: none;">{{ $prim->pacient->name }} {{ $prim->pacient->lastname }}</span>
                        </a>
                        @endif
                    </td>
                    @if(!isset($prim->pacient))
                    @if($id==0)
                    <td><a href="{{ url('lista/pacijenti_u_proceduri') }}"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a></td>
                    @else
                    <td><a href="{{ url('ubaciPrimus/'.$id.'/'.$prim->id) }}"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a></td>
                    @endif
                    @else
                    <td><a href="{{ url('ukloniPrimus/'.$prim->pacient->id) }}"><span style="color: orangered;" class="glyphicon glyphicon-remove"></span></a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <div style="text-align: center;">
<h2>II smena</h2>
 </div>
        <table class="table table-hover">
            <tbody>
                @foreach($primus2 as $prim)
                <tr>
                    <td>{{ $prim->vreme }}</td>
                    <td>
                        @if(isset($prim->pacient))
                        <a style="color: maroon;" href="{{ url('pacijent/'.$prim->pacient->id) }}">
                        {{ $prim->pacient->name }} {{ $prim->pacient->lastname }}
                        </a>
                        @endif
                    </td>
                    <td>
                        @if($prim->pacient && $prim->pacient->pomeranje)
                        <a class="pomeranje2" id="move{{$prim->pacient->pomeranje->id}}" style="color: black;" href="#">
                            pomeranje <span id="ime{{$prim->pacient->pomeranje->id}}" style="display: none;">{{ $prim->pacient->name }} {{ $prim->pacient->lastname }}</span>
                        </a>
                        @endif
                    </td>
                    @if(!isset($prim->pacient))
                    @if($id==0)
                    <td><a href="{{ url('lista/pacijenti_u_proceduri') }}"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a></td>
                    @else
                    <td><a href="{{ url('ubaciPrimus/'.$id.'/'.$prim->id) }}"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a></td>
                    @endif
                    @else
                    <td><a href="{{ url('ukloniPrimus/'.$prim->pacient->id) }}"><span style="color: orangered;" class="glyphicon glyphicon-remove"></span></a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    
    
    
    
    
</section>


@include('aparati.pomeranje');


@stop

