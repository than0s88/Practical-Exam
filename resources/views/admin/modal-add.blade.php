<div class="modal fade" id="modal-add">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="padding-bottom: 0px;">
        <p class="heading lead"><strong>Add User</strong>
        </p>
      </div>
      <form id="form-add" name="form-add" method="post">
        @csrf
        <div class="modal-body">
          <!-- BEGIN FORM-->
          <div class="row" style="text-align: center; margin-bottom: 1px">
            <div class="col-md-12 add_image_up">
              <div class="row" style="margin-bottom: 15px;">
                <div class="img-responsive add_image_preview"></div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="add_user_image custom-file-input" name="image">
                  <label class="custom-file-label" for="customFile">User Image</label>
                </div>
              </div>
            </div>

          </div> <!-- END ROW-->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="item_category">Role</label>
                <select class="form-control" name="role" id="role">
                  <option value="">Select</option>
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
                <button type="submit" class="btn btn-danger" id="btn-add">Save</button>
                {{-- <button type="submit" class="btn btn-danger">Save</button> --}}
              </div>
            </form>
          </div>
        </div>
      </div>
