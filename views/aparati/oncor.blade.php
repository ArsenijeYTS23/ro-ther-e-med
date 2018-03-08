@extends('template')
@section('sadrzaj')
<section id="team">
    <h1 style="text-align: center;">ONCOR</h1>
    <div class="row">
   
    <div class="col-sm-6">
        <div style="text-align: center;">
<h2>I smena</h2>
 </div>
        <table class="table table-hover">
            <tbody>
                @foreach($oncor1 as $onc)
                <tr>
                    <td>{{ $onc->vreme }}</td>
                    <td>
                        @if(isset($onc->pacient))
                          <a style="color: maroon;" href="{{ url('pacijent/'.$onc->pacient->id) }}">
                        {{ $onc->pacient->name }} {{ $onc->pacient->lastname }}
                          </a>
                        @endif
                    </td>
                    
                    <td>
                        @if($onc->pacient && $onc->pacient->pomeranje)
                        <a class="pomeranje2" id="move{{$onc->pacient->pomeranje->id}}" style="color: black;" href="#">
                            pomeranje <span id="ime{{$onc->pacient->pomeranje->id}}" style="display: none;">{{ $onc->pacient->name }} {{ $onc->pacient->lastname }}</span>
                        </a>
                        @endif
                    </td>
                    
                    @if(!isset($onc->pacient))
                    @if($id==0)
                    <td><a href="{{ url('lista/pacijenti_u_proceduri') }}"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a></td>
                    @else
                    <td><a href="{{ url('ubaciOncor/'.$id.'/'.$onc->id) }}"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a></td>
                    @endif
                    @else
                   <td><a href="{{ url('ukloniOncor/'.$onc->pacient->id) }}"><span style="color: orangered;" class="glyphicon glyphicon-remove"></span></a></td>
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
                @foreach($oncor2 as $onc)
                 <tr>
                    <td>{{ $onc->vreme }}</td>
                    <td>
                        @if(isset($onc->pacient))
                          <a style="color: maroon;" href="{{ url('pacijent/'.$onc->pacient->id) }}">
                        {{ $onc->pacient->name }} {{ $onc->pacient->lastname }}
                          </a>
                        @endif
                    </td>
                    
                    <td>
                        @if($onc->pacient && $onc->pacient->pomeranje)
                        <a class="pomeranje2" id="move{{$onc->pacient->pomeranje->id}}" style="color: black;" href="#">
                            pomeranje <span id="ime{{$onc->pacient->pomeranje->id}}" style="display: none;">{{ $onc->pacient->name }} {{ $onc->pacient->lastname }}</span>
                        </a>
                        @endif
                    </td>
                    
                    @if(!isset($onc->pacient))
                    @if($id==0)
                    <td><a href="{{ url('lista/pacijenti_u_proceduri') }}"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a></td>
                    @else
                    <td><a href="{{ url('ubaciOncor/'.$id.'/'.$onc->id) }}"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a></td>
                    @endif
                    @else
                    <td><a href="{{ url('ukloniOncor/'.$onc->pacient->id) }}"><span style="color: orangered;" class="glyphicon glyphicon-remove"></span></a></td>
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

