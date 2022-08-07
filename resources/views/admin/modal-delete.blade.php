<!-- DELETE SINGLE MODAL-->
<div class="modal fade" id="modal-delete">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="padding-bottom: 0px;">
        <p class="heading lead">Confirm delete</p>
      </div>
      <div class="modal-body" class="alert alert-danger">
        <p>Are you sure you want to delete this record?</p>
        <input type="hidden" id="delete_id" name="delete_id">
      </div>
      
      <!--Footer-->
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger btn-delete-single-confirm">Confirm</button>
      </div>
    </div>
  </div>
</div>