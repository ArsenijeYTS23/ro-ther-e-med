@foreach($pacijent->nastavak as $nastavak)
<section style="padding-bottom: 10px; padding-top: 0px; margin-top: 0px;" id="team">
    <h4>Nastavak</h4><br>
  <table class="table table-reflow">
 
  <tbody>
   
   
  
    <tr>
        <td>Datum konzilijuma</td>
        <td>
            @if($nastavak->nastavakKonzilijum <> null)
          {{ Carbon\Carbon::parse($nastavak->nastavakKonzilijum)->format('d-m-Y')}}
           @endif
        </td>
    </tr>
  
    <tr>
      <td>Dijagnoza</td>
      @if(isset($nastavak->diagnosas))
      <td><b>{{ $nastavak->diagnosas->sifra }}</b><br> {{ $nastavak->diagnosas->naziv }}</td>
      @else <td></td>
      @endif
    </tr>
   
    <tr>
        <td>Datum obrade</td>
        <td>
             @if($nastavak->nastavakObrada <> null)
          {{ Carbon\Carbon::parse($nastavak->nastavakObrada)->format('d-m-Y')}}
           @endif
        </td>
    </tr>
    <tr>
        <td>Obradjen za</td>
        <td>
            @if(isset($nastavak->nastavakObradjenZa))
           {{$nastavak->nastavakObradjenZa}}
            @endif
        </td>
    </tr>
    <tr>
      <td>Aparat</td>
   @if(isset($nastavak->nastavakKraj))
   <td>
       @if(isset($nastavak->nastavakObradjenZa))
       {{$nastavak->nastavakObradjenZa}}
       @else
       {{ ' '  }}
       @endif
   </td>
      
@elseif(isset($pacijent->primus))
<td>
    <a href="{{ url('primus') }}">Primus</a> &nbsp; {{ $pacijent->primus->vreme }}<br><br>
     @can('aparat',$pacijent)
    <a style="color: maroon;" href="{{ url('ukloniPrimus/'.$pacijent->id) }}">Ukloni sa primusa</a>
 @endcan
</td>

@elseif(isset($pacijent->oncor))
<td>
    <a href="{{ url('oncor') }}">Oncor</a><br><br>
     @can('aparat',$pacijent)
 <a style="color: maroon;" href="{{ url('ukloniOncor/'.$pacijent->id) }}">Ukloni sa onkora</a>
  @endcan
</td>
@elseif(isset($pacijent->elekta1))
<td>
    <a href="{{ url('elekta1') }}">Elekta 1</a><br><br>
    @can('aparat',$pacijent)
 <a style="color: maroon;" href="{{ url('ukloniElekta1/'.$pacijent->id) }}">Ukloni sa elekte</a>
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
      <td>Pocetak zracenja</td>
      <td>{{ $nastavak->nastavakPocetak }}</td>
    </tr>
     <tr>
      <td>Kraj zracenja</td>
     
      <td>{{ $nastavak->nastavakKraj }}</td>
     
    </tr>
     
   
  </tbody>
</table>
     @can('menja', $pacijent)
     <button type="button" class="btn btn-primary izmeniNastavak" value="{{ $nastavak->id }}">Izmeni</button>
    <button type="button" style="float: right; background: orangered;" class="btn btn-primary" data-toggle="modal" data-target="#obrisinastavakModal{{$nastavak->id}}">Obrisi nastavak</button>
    @endcan
    <hr style="background: gray; height: 2px;">
</section>

<div class="modal fade" id="obrisinastavakModal{{$nastavak->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upozorenje</h4>
        </div>
        <div class="modal-body">
          <p>Da li ste sigurni da hocete da obrisete </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="location.href='{{ url('nastavak/delete/'.$nastavak->id) }}'">Da</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Ne</button>
        </div>
      </div>
      
    </div>
  </div>
@endforeach