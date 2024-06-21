<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Role Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="./includes/add_role.php" autocomplete="off" onSubmit="return valid();" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="role_name" class="control-label">Role Name</label>
                <input type="text" class="form-control" name="ROLE_NAME" placeholder="Role Name" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="dept_designated" class="control-label">Department Designated</label>
                <select name="DEPT_DESIGNATED" class="form-control">
                  <option value="" disabled selected>Select department</option>
                  <?php include("selecting_department.php"); ?>
                </select>
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
