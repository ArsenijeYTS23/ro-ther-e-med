<div class="modal fade" id="myModalPomeranje2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="frmTasks2">
                             <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Ubaci koordinate stola </h4>
                              </div>
                              
                        <div class="modal-body">
<!--                     <script>
               function myFunction() {
                       var x = document.getElementById("ubacix").value;
                       var y = document.getElementById("eee");
                        y.innerHTML = +x + +5;
                     }
                     </script>-->
                              
                                 <div id="ubaciPomeranje" class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">X</label>
                                   
                                    <div class="col-sm-9">
                                         <input style="width: 80px; display: inline-block;"  ng-model="x"   type="text" class="form-control">
                                          <b> <p ng-if="x" style="float: right; font-size: 50px; position: absolute; right: 50px; top: -33px;  "><% (x-0) + (jedan.pomeranje.pomeranje_x-0) %></p></b>
                                       
                                    </div><br>
                                    <hr>
                                    <label for="inputEmail3" class="col-sm-3 control-label">Y</label>
                                   
                                    <div class="col-sm-9">
                                         <input style="width: 80px; display: inline-block;"  ng-model="y"   type="text" class="form-control">
                                          <b> <p ng-if="y" style="float: right; font-size: 50px; position: absolute; right: 50px; top: -33px;" ><% (y-0) + (jedan.pomeranje.pomeranje_y-0) %></p></b>
                                       
                                    </div><br>
                                    <hr>
                                    <label for="inputEmail3" class="col-sm-3 control-label">Z</label>
                                   
                                    <div class="col-sm-9">
                                         <input style="width: 80px; display: inline-block;"  ng-model="z"   type="text" class="form-control">
                                          <b> <p ng-if="z" style="float: right; font-size: 50px; position: absolute; right: 50px; top: -33px;" ><% (z-0) + (jedan.pomeranje.pomeranje_z-0) %></p></b>
                                       
                                    </div><br>
                                    <hr>
                                      
                                </div>
                                 
                                 
                                 
                                 
                           
                        </div>
                             <div class="modal-footer">
                                 <h2 style="color: maroon;" id="imeiprezime" ></h2>
                        </div>
                        </form>
                     
                    </div>

                </div>
            </div>