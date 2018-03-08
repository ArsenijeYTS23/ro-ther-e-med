@extends('template')
@section('sadrzaj')
<section id="team">
    <h1 style="text-align: center;">Elekta 1</h1>
    <div class="row">
   
    <div class="col-sm-6">
        <div style="text-align: center;">
<h2>I smena</h2>
 </div>
        <table class="table table-hover">
            <tbody>
                @foreach($elekta11 as $ele)
                <tr>
                    <td>{{ $ele->vreme }}</td>
                    <td>
                        @if(isset($ele->pacient))
                        <a style="color: maroon;" href="{{ url('pacijent/'.$ele->pacient->id) }}">
                        {{ $ele->pacient->name }} {{ $ele->pacient->lastname }}
                        </a>
                        @endif
                    </td>
                    @if(!isset($ele->pacient))
                    @if($id==0)
                    <td><a href="{{ url('lista/pacijenti_u_proceduri') }}"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a></td>
                    @else
                    <td><a href="{{ url('ubaciElekta1/'.$id.'/'.$ele->id) }}"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a></td>
                    @endif
                    @else
                    <td></td>
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
                @foreach($elekta12 as $ele)
                <tr>
                    <td>{{ $ele->vreme }}</td>
                     <td>
                          @if(isset($ele->pacient))
                        <a style="color: maroon;" href="{{ url('pacijent/'.$ele->pacient->id) }}">
                        {{ $ele->pacient->name }} {{ $ele->pacient->lastname }}
                        </a>
                        @endif
                    </td>
                     @if(!isset($ele->pacient))
                    @if($id==0)
                    <td><a href="{{ url('lista/pacijenti_u_proceduri') }}"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a></td>
                    @else
                    <td><a href="{{ url('ubaciElekta1/'.$id.'/'.$ele->id) }}"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a></td>
                    @endif
                    @else
                    <td></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    
    
    
    
    
</section>





@stop

