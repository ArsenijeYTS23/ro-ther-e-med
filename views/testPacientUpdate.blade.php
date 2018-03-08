<div class="modal fade" id="myModal22" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                         <form id="frmTasks" name="frmTasks" enctype="multipart/form-data" class="form-horizontal" novalidate="" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Izmeni pacijenta</h4>
                        </div>
                              
                        <div class="modal-body">
                     
                                 
                                             
                                 <div id="pacijenti" class="form-group">
                                      
                                    <label for="inputEmail3" class="col-sm-3 control-label">Ime</label>
                                    <div class="col-sm-9">
                                        <input   type="text" class="form-control" ng-model="name"   placeholder="Ime" >
                                       <br>
                                    </div>
                                   
                                      <label for="inputEmail3" class="col-sm-3 control-label">Prezime</label>
                                    <div class="col-sm-9">
                                        <input  type="text" class="form-control" ng-model="lastname"  name="lastname" placeholder="prezime" >
                                       <br>
                                    </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Karton</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" ng-model="karton"  name="karton" placeholder="broj">
                                       <br>
                                    </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">godiste</label>
                                    <div class="col-sm-9">
                                        <input  type="number" min="1800" max="2016" class="form-control" ng-model="godiste"  >
                                       <br>
                                    </div>
                                   <label for="inputEmail3" class="col-sm-3 control-label">Mesto</label>
                                    <div class="col-sm-9">
                                        <input  type="text" class="form-control"  name="mesto" ng-model="mesto" placeholder="mesto">
                                       <br>
                                    </div>
                                   <label for="inputEmail3" class="col-sm-3 control-label">Telefon</label>
                                    <div class="col-sm-9">
                                        <input  type="text" class="form-control"  name="telefon" ng-model="telefon" placeholder="telefon">
                                       <br>
                                    </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Diagnoza</label>
                                    <div class="col-sm-9">
                                        <select  class="form-control" ng-model="diagnoza">
                                            <option value="0"> </option>
                                            <option ng-repeat="d in dijagnoza" ng-value="d.id" ng-selected="d.id==jedan.diagnosas_id"><% d.naziv %></option>
                                               
                                             </select>
                                        <br>
                                    </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Doktor</label>
                                    <div class="col-sm-9">
                                      
                                        <select  class="form-control"  ng-model="doctor">
                                            <option value="0"> </option>
                                          
                                          <option ng-repeat="d in doktor" ng-value="d.id" ng-selected="d.id===jedan.doctor_id"><% d.name+' '+d.lastname %></option>
                                              
                                             </select>
                                        <br>
                                    </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Lokalizacija</label>
                                    <div class="col-sm-9">
                                        <select class="form-control"  ng-model="lokalizacija">
                                            <option value="0"> </option>
                                          
                                          <option ng-repeat="l in localization" ng-value="l.id" ><% l.name %></option>
                                             
                                             </select>
                                        <br>
                                    </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Odluka</label>
                                    <div class="col-sm-9">
                                        <select  class="form-control" name="odluka" ng-model="odluka">
                                            <option value="0"> </option>
                                          
                                          <option ng-repeat="o in odlukas" ng-value="o.id" ><% o.name %></option>
                                              
                                             </select>
                                        <br>
                                    </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Datum konzilijuma</label>
                                    <div class="col-sm-9">
                                        <input id="konzilijum" name="konzilijum" ng-model="konzilijum" class="form-control datepicker" type="text"  >
                                        <br>
                                      </div>
                                      
                                      <label for="obrada" class="col-sm-3 control-label">Datum obrade</label>
                                    <div class="col-sm-9">
                                        <input id="obrada"  name="obrada" ng-model="obrada" class="form-control datepicker" type="text"  >
                                         <br>
                                      </div>
                                      <label for="inputEmail3" class="col-sm-3 control-label">Obradjen za</label>
                                    <div class="col-sm-9">
                                        <select  class="form-control" name="obradjenZa" ng-model="obradjenZa">
                                            <option value=""> </option>
                                          <option value="Primus">Primus</option>
                                          <option value="Oncor">Oncor</option>
                                          <option value="Elekta">Elekta</option>
                                              
                                             </select>
                                        <br>
                                    </div>
                                      <label for="pocetak" class="col-sm-3 control-label">Pocetak zracenja</label>
                                    <div class="col-sm-9">
                                        <input id="pocetak" name="pocetak"  ng-model="pocetak" class="form-control datepicker" type="text"  >
                                         <br>
                                      </div>
                                      <label for="kraj" class="col-sm-3 control-label">Kraj zracenja</label>
                                    <div class="col-sm-9">
                                        <input id="kraj" name="kraj" ng-model="kraj" class="form-control datepicker" type="text"  >
                                         <br>
                                      </div>
                                        <label for="obrada" class="col-sm-3 control-label">Napomena</label>
                                       <div class="col-sm-9">
                                           <textarea class="form-control" rows="5"  name="napomena" ng-model="napomena"></textarea> <br>
                                      </div>
                                        <label for="obrada" class="col-sm-3 control-label">Beleska</label>
                                       <div class="col-sm-9">
                                           <textarea class="form-control" rows="5"  name="beleska" ng-model="beleske"></textarea> <br>
                                      </div>
                                </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button  class="btn btn-primary" id="btn-save"  ng-click="saveUpdates(jedan.id)" data-dismiss="modal">Upisi</button>
                           
                           
                        </div>
                         </form>
                    </div>

                </div>
            </div>