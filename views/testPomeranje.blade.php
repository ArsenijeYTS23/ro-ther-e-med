<div class="modal fade" id="myModalPomeranje333" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content">
                       
                         <form enctype="multipart/form-data" class="form-horizontal" novalidate=""  method="post" >
                           

                          
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel"><% jedan.name+" "+jedan.lastname %></h4>
                        </div>
                              
                        <div class="modal-body">
                     
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                              

                                 <div id="ubaciPomeranje" class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">X</label>
                                   
                                    <div class="col-sm-9">
                                        
                                        <input id="ubacix"  type="text" class="form-control" ng-model="pomeranje_x"  name="pomeranje_x" placeholder=" + desno   - levo">
                                       
                                       
                                    </div>
                                    <hr>
                                    <label for="inputEmail3" class="col-sm-3 control-label">Y</label>
                                   
                                    <div class="col-sm-9">
                                        
                                        <input id="ubaciy"  type="text" class="form-control" ng-model="pomeranje_y"  name="pomeranje_y" placeholder=" + ka glavi   - ka nogama">
                                      
                                       
                                    </div>
                                    <hr><br>
                                    <label for="inputEmail3" class="col-sm-3 control-label">Z</label>
                                   
                                    <div class="col-sm-9">
                                       
                                        <input id="ubaciz"  type="text" class="form-control" ng-model="pomeranje_z"  name="pomeranje_z" placeholder=" + gore   - dole">
                                       
                                       
                                    </div>
                                    <hr>
                                      
                                </div>
                                 
                                 
                                 
                                 
                           
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="btn-save" data-dismiss="modal"  ng-click="insertPomeranje(jedan.id)" >Upisi</button>
                           
                           
                        </div>
                         </form>
                    </div>

                </div>
            </div>