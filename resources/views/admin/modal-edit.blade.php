<div class="modal fade" id="modal-edit">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="padding-bottom: 0px;">
        <p class="heading lead"><strong>Edit User</strong></p>
      </div>
      <form method="post" id="form-edit" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <!-- BEGIN FORM-->
          <div class="row" style="text-align: center; margin-bottom: 10px">
            <div class="col-md-12 edit_image_up">
              <div class="row" style="margin-bottom: 15px;">
                <div class="img-responsive edit_image_preview"></div>
              </div>
              <div class="form-group" style="margin-top: 10px;">
                <div class="custom-file">
                  <input type="file" class="edit_user_image custom-file-input" name="image">
                  <label class="custom-file-label" for="customFile">User Image</label>
                </div>
              </div>
            </div>

          </div> <!-- END ROW-->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input class="form-control" required name="id" id="id" type="hidden">
              </div>
            </div>
        </div> <!-- END ROW-->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="item_category">Role</label>
                <select class="form-control" name="role" id="role">
                  <option value="">---Select---</option>
                  <option value="User">User</option>
                  <option value="Admin">Admin</option>
                </select>
              </div>
            </div>
           </div> <!-- END ROW-->

              <div class="row justify-content-md-center">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="item_category">Name</label>
                        <input class="form-control" required name="name" id="name" type="text">
                      </div>
                    </div>
                </div> <!-- END ROW-->
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="item_category">Email</label>
                        <input  type="text" class="form-control" name="email" id="email">
                      </div>
                    </div>
                   </div> <!-- END ROW-->
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="item_category">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                      </div>
                    </div>
                   </div> 
                   <!-- END ROW-->
              </div> 
              <!-- END FORM-->
                <!--Footer-->
              </div>
                   </div> 
                   <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id="btn-edit">Update</button>
                  </div>
            </form>
          </div>
        </div>
      </div>