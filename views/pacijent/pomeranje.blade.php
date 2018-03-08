<div class="modal fade" id="myModalPomeranje" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        @if($pacijent->pomeranje)
                         <form id="frmTasks1" name="frmTasks" enctype="multipart/form-data" class="form-horizontal" novalidate=""  method="post" action="{{url('pomeranje/izmeni/'.$pacijent->pomeranje->id)}}">
                             @else
                         <form id="frmTasks1" name="frmTasks" enctype="multipart/form-data" class="form-horizontal" novalidate=""  method="post" action="{{url('pomeranje/sacuvaj/'.$pacijent->id)}}">
                             @endif
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Ubaci pomeranje</h4>
                        </div>
                              
                        <div class="modal-body">
                     
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                              

                                 <div id="ubaciPomeranje" class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">X</label>
                                   
                                    <div class="col-sm-9">
                                        @if($pacijent->pomeranje && $pacijent->pomeranje->pomeranje_x)
                                        <input id="ubacix"  type="text" class="form-control"  name="pomeranje_x" placeholder=" + desno   - levo" value="{{$pacijent->pomeranje->pomeranje_x}}">
                                        @else
                                        <input id="ubacix"  type="text" class="form-control"  name="pomeranje_x" placeholder=" + desno   - levo">
                                        @endif
                                       
                                    </div>
                                    <hr>
                                    <label for="inputEmail3" class="col-sm-3 control-label">Y</label>
                                   
                                    <div class="col-sm-9">
                                         @if($pacijent->pomeranje && $pacijent->pomeranje->pomeranje_y)
                                         <input id="ubaciy"  type="text" class="form-control"  name="pomeranje_y" placeholder=" + ka glavi   - ka nogama" value="{{$pacijent->pomeranje->pomeranje_y}}">
                                        @else
                                        <input id="ubaciy"  type="text" class="form-control"  name="pomeranje_y" placeholder=" + ka glavi   - ka nogama">
                                        @endif
                                       
                                    </div>
                                    <hr><br>
                                    <label for="inputEmail3" class="col-sm-3 control-label">Z</label>
                                   
                                    <div class="col-sm-9">
                                        @if($pacijent->pomeranje && $pacijent->pomeranje->pomeranje_z)
                                        <input id="ubaciz"  type="text" class="form-control"  name="pomeranje_z" placeholder=" + gore   - dole" value="{{$pacijent->pomeranje->pomeranje_y}}">
                                        @else
                                        <input id="ubaciz"  type="text" class="form-control"  name="pomeranje_z" placeholder=" + gore   - dole">
                                        @endif
                                       
                                    </div>
                                    <hr>
                                      
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