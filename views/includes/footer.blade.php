  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                         <form id="frmTasks3" name="frmTasks" enctype="multipart/form-data" class="form-horizontal" novalidate=""  method="post" action="">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Dodaj pacijenta</h4>
                        </div>
                              
                        <div class="modal-body">
                     
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                              

                                 <div id="dijagnoza" class="form-group">
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
                                 <div id="doktor" class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Ime</label>
                                    <div class="col-sm-9">
                                        <input id="drName"  type="text" class="form-control"  name="drName" placeholder="Sifra">
                                       
                                    </div>
                                    <hr>
                                     <label for="inputEmail3" class="col-sm-3 control-label">Prezime</label>
                                    <div class="col-sm-9">
                                        <input id="drLastname"  type="text" class="form-control"  name="drLastname" placeholder="Sifra">
                                       
                                    </div>
                                </div>
                                 <div id="izmeniSliku" class="form-group">
                                   
                                    <div class="col-sm-9">
                                        <input id="slika"  type="file" class="form-control"  name="slika">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                    </div>
                                    
                                     
                                </div>
                                 <div id="user" class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-9">
                                        <h4 id="userName"></h4>
                                    </div>
                                    <hr>
                                    <label for="inputEmail3" class="col-sm-3 control-label">Dozvola</label>
                                    <div class="col-sm-9">
                                        <select id="rola" class="form-control" name="rola">
                                            <option value="0"> </option>
                                            <option value="1">Super admin</option>
                                            <option value="2">Doktor</option>
                                            <option value="3">Salter</option>
                                           
                                             </select>
                                        <br>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-3 control-label">Doktor</label>
                                    <div class="col-sm-9">
                                        <select id="rolaDoktor" class="form-control" name="rolaDoktor">
                                            <option value="0"> </option>
                                            @foreach($data[1] as $dr)
                                          <option value="{{ $dr->id }}">{{ $dr->name }} {{ $dr->lastname }}</option>
                                                @endforeach
                                             </select>
                                        <br>
                                    </div>
                                </div>
                                 <div id="pacijenti" class="form-group">
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                             
                                    <label for="inputEmail3" class="col-sm-3 control-label">Ime</label>
                                    <div class="col-sm-9">
                                        <input id="name"  type="text" class="form-control"  name="name" placeholder="Ime">
                                       <br>
                                    </div>
                                   
                                      <label for="inputEmail3" class="col-sm-3 control-label">Prezime</label>
                                    <div class="col-sm-9">
                                        <input id="lastname" type="text" class="form-control"  name="lastname" placeholder="prezime">
                                       <br>
                                    </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Karton</label>
                                    <div class="col-sm-9">
                                        <input id="karton" type="text" class="form-control"  name="karton" placeholder="broj">
                                       <br>
                                    </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">godiste</label>
                                    <div class="col-sm-9">
                                        <input id="godiste" type="number" min="1910" max="2016" value="1960" class="form-control"  name="godiste" placeholder="">
                                       <br>
                                    </div>
                                   <label for="inputEmail3" class="col-sm-3 control-label">Mesto</label>
                                    <div class="col-sm-9">
                                        <input id="mesto" type="text" class="form-control"  name="mesto" placeholder="mesto">
                                       <br>
                                    </div>
                                   <label for="inputEmail3" class="col-sm-3 control-label">Telefon</label>
                                    <div class="col-sm-9">
                                        <input id="telefon" type="text" class="form-control"  name="telefon" placeholder="telefon">
                                       <br>
                                    </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Diagnoza</label>
                                    <div class="col-sm-9">
                                        <select id="diagnoza" class="form-control" name="diagnoza">
                                            <option value="0"> </option>
                                            @foreach($data[2] as $dia)
                                          <option value="{{ $dia->id }}">{{ $dia->naziv }}</option>
                                                @endforeach
                                             </select>
                                        <br>
                                    </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Doktor</label>
                                    <div class="col-sm-9">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                        <select id="doktorP" class="form-control" name="doktor">
                                            <option value="0"> </option>
                                            @foreach($data[1] as $dr)
                                          <option value="{{ $dr->id }}">{{ $dr->name }} {{ $dr->lastname }}</option>
                                                @endforeach
                                             </select>
                                        <br>
                                    </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Lokalizacija</label>
                                    <div class="col-sm-9">
                                        <select id="lokalizacija" class="form-control" name="lokalizacija">
                                            <option value="0"> </option>
                                            @foreach($data[0] as $lok)
                                          <option value="{{ $lok->id }}">{{ $lok->name }}</option>
                                                @endforeach
                                             </select>
                                        <br>
                                    </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Odluka</label>
                                    <div class="col-sm-9">
                                        <select id="odluka" class="form-control" name="odluka">
                                            <option value="0"> </option>
                                            @foreach($data[3] as $odl)
                                          <option value="{{ $odl->id }}">{{ $odl->name }}</option>
                                                @endforeach
                                             </select>
                                        <br>
                                    </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Datum konzilijuma</label>
                                    <div class="col-sm-9">
                                        <input id="konzilijum" name="konzilijum" class="form-control datepicker" type="text"  >
                                        <br>
                                      </div>
                                      
                                      <label for="obrada" class="col-sm-3 control-label">Datum obrade</label>
                                    <div class="col-sm-9">
                                        <input id="obrada" name="obrada" class="form-control datepicker" type="text"  >
                                         <br>
                                      </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Obradjen za</label>
                                    <div class="col-sm-9">
                                        <select id="obradjenZa" class="form-control" name="obradjenZa">
                                            <option value=""> </option>
                                          <option value="Primus">Primus</option>
                                          <option value="Oncor">Oncor</option>
                                          <option value="Elekta">Elekta</option>
                                              
                                             </select>
                                        <br>
                                    </div>
                                      <label for="pocetak" class="col-sm-3 control-label">Pocetak zracenja</label>
                                    <div class="col-sm-9">
                                        <input id="pocetak" name="pocetak" class="form-control datepicker" type="text"  >
                                         <br>
                                      </div>
                                      <label for="kraj" class="col-sm-3 control-label">Kraj zracenja</label>
                                    <div class="col-sm-9">
                                        <input id="kraj" name="kraj" class="form-control datepicker" type="text"  >
                                         <br>
                                      </div>
                                        <label for="obrada" class="col-sm-3 control-label">Napomena</label>
                                       <div class="col-sm-9">
                                           <textarea class="form-control" rows="5" id="napomena" name="napomena"></textarea> <br>
                                      </div>
                                        <label for="obrada" class="col-sm-3 control-label">Beleska</label>
                                       <div class="col-sm-9">
                                           <textarea class="form-control" rows="5" id="beleska" name="beleska"></textarea> <br>
                                      </div>
                                </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="add">Upisi</button>
                           
                            <input type="hidden" id="task_id" name="task_id" value="0">
                        </div>
                         </form>
                    </div>

                </div>
            </div>

    <!-- Bootstrap Core JavaScript -->
   

    <!-- Plugin JavaScript -->
   <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('js/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('js/contact_me.js')}}"></script>

    <!-- Theme JavaScript -->
    <script src="{{asset('js/agency.min.js')}}"></script>
    <script src="{{asset('js/agency.js')}}"></script>
    

  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>  <!-- ----surce za datepicker-->
  <script>
  $(function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
  });
  </script>
  
</body>

</html>