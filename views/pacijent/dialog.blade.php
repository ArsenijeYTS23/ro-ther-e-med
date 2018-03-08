 <div class="modal fade" id="pacijentModal{{$pacijent->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upozorenje</h4>
        </div>
        <div class="modal-body">
          <p>Da li ste sigurni da hocete da arhivirate pacijenta - {{ $pacijent->name }} {{ $pacijent->lastname }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="location.href='{{ url('pacijent/delete/'.$pacijent->id) }}'">Da</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Ne</button>
        </div>
      </div>
      
    </div>
  </div>
