<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Admin Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <!-- <a href="../includes/add_employee.php"></a> -->
        <form class="form-horizontal" method="POST" action="./includes/add_admin.php" autocomplete="off" onSubmit="return valid();" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="username" class="control-label">Username</label>
                <input type="text" class="form-control" name="USERNAME" placeholder="Username" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input type="password" class="form-control" name="PASSWORD" placeholder="Password">
                <div class="input-group-append">
                </div>
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" class="form-control" name="NAME" placeholder="Name" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="role" class="control-label">Role</label>
                <select name="ROLE" class="form-control">
                  <option value="" disabled selected>Select role</option>
                  <option value="SysAdmin"">System Administrator</option>
                </select>
              </div>
            </div>

            <!-- Will be use later on ... -->
            <!-- <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="role" class="control-label">Role</label>
                <select name="ROLE" class="form-control">
                  <option value="" disabled selected> Select role</option>
                  <?php //include("selecting_role.php"); ?>
                </select>
              </div>
            </div> -->

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="profile" class="control-label">Profile</label>
                <!-- <input type="file" class="form-control" name="PROFILE" accept=".jpg, .jpeg, .png"> -->
                <input type="file" class="form-control" name="PROFILE">
              </div>
            </div>

            <div class="col-sm-12 mt-3">
              <div class="d-grid">
                <button type="reset" class="btn btn-light" onclick="window.alert('Form cleared. Please provide a new data.')">
                  <i class="material-icons" id="material-icon">restart_alt</i> Reset form
                </button>
              </div>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="SUBMIT" class="btn btn-primary">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="../assets/js/employee_email_check_availability.js"></script>