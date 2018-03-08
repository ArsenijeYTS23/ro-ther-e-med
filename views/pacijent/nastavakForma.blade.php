 


<div class="modal fade" id="nastavakModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                         <form id="frmTasks1" name="frmTasks" class="form-horizontal" novalidate=""  method="post" action="{{url('nastavak/save/'.$pacijent->id)}}">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel1">Dodaj nastavak--<p>{{$pacijent->name}} {{$pacijent->lastname}}  {{$pacijent->karton}}</p></h4>
                        </div>
                              
                        <div class="modal-body">
                     
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                              

                                 <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Konzilijum</label>
                                   
                                    <div class="col-sm-9">
                                        <input id="nastavakKonzilijum"  type="text" class="form-control datepicker"  name="nastavakKonzilijum" placeholder="">
                                       <br>
                                    </div>
                                    
                                      <label for="inputEmail3" class="col-sm-3 control-label">Dijagnoza</label>
                                     <div class="col-sm-9">
                                        <select id="nastavakDiagnoza" class="form-control" name="nastavakDiagnoza">
                                            <option value="0"> </option>
                                            @foreach($data[2] as $dia)
                                          <option value="{{ $dia->id }}">{{ $dia->naziv }}</option>
                                                @endforeach
                                             </select>
                                        <br>
                                    </div>
                                     
                                      <label for="inputEmail3" class="col-sm-3 control-label">Obrada</label>
                                    <div class="col-sm-9">
                                        <input id="nastavakObrada" type="text" class="form-control datepicker"  name="nastavakObrada" placeholder="Naziv">
                                       <br>
                                    </div>
                                       <label for="inputEmail3" class="col-sm-3 control-label">Obradjen za</label>
                                    <div class="col-sm-9">
                                        <select id="nastavakObradjenZa" class="form-control" name="nastavakObradjenZa">
                                            <option value=""> </option>
                                          <option value="Primus">Primus</option>
                                          <option value="Oncor">Oncor</option>
                                          <option value="Elekta">Elekta</option>
                                              
                                             </select>
                                        <br>
                                    </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Pocetak</label>
                                    <div class="col-sm-9">
                                        <input id="nastavakPocetak" type="text" class="form-control datepicker"  name="nastavakPocetak" placeholder="Naziv">
                                       <br>
                                    </div>
                                       
                                      <label for="inputEmail3" class="col-sm-3 control-label">Kraj</label>
                                    <div class="col-sm-9">
                                        <input id="nastavakKraj" type="text" class="form-control datepicker"  name="nastavakKraj" placeholder="Naziv">
                                       <br>
                                    </div>
                                       
                                </div>
                                 
                           
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btn-save1" value="add">Upisi</button>
                           
                            
                        </div>
                         </form>
                    </div>

                </div>
            </div>

