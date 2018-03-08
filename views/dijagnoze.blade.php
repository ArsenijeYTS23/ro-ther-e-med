
@extends('template')
@section('sadrzaj')

<section id="team" style="padding-bottom: 70px;">
    <h1 style="text-align: center;">Dijagnoze</h1>
     <table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Sifra</th>
      <th>Naziv dijagnoze</th>
     
    </tr>
  </thead>
  <tbody>
      @foreach($dijagnoza as $dij)
    <tr>
  
      <th scope="row"></th>
      <td id="sifra{{$dij->id}}">{{ $dij->sifra }}</td>
      <td>{{ $dij->naziv }}</td>
      <td><button class="btn btn-primary btn-xs izmeni" value="{{ $dij->id }}" type="button">izmeni</button></td>
      <td><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal{{$dij->id}}">Obrisi</button></td>
  
    </tr>
      <div class="modal fade" id="myModal{{$dij->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upozorenje</h4>
        </div>
        <div class="modal-body">
          <p>Da li ste sigurni da hocete da obrisete dijagnozu - {{ $dij->naziv }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" onclick="location.href='{{ url('dijagnoza/delete/'.$dij->id) }}'">Obrisi</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
        </div>
      </div>
      
    </div>
  </div>
  
   @endforeach
  </tbody>
</table>

</section>
        
             <button style="background:rgb(149, 154, 206);" id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Upisi dijagnozu</button>
        
<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                         <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate=""  method="post" action="">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Dijagnoza</h4>
                        </div>
                              
                        <div class="modal-body">
                     
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                              

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Sifra</label>
                                    <div class="col-sm-9">
                                        <input id="sifra"  type="text" class="form-control"  name="sifra" placeholder="Sifra">
                                       
                                    </div>
                                    <hr>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Naziv</label>
                                    <div class="col-sm-9">
                                        <textarea id="naziv" type="text" class="form-control"  name="naziv" placeholder="Naziv"></textarea>
                                       
                                    </div>
                                </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btn-save-u" value="add">Upisi</button>
                            <button type="submit" class="btn btn-primary" id="btn-save-i" value="add">Izmeni</button>
                            <input type="hidden" id="task_id" name="task_id" value="0">
                        </div>
                         </form>
                    </div>

                </div>
            </div>-->
<div style="height: 500px;"></div>
 <script src="{{asset('js/mojAjax.js')}}"></script>
@stop