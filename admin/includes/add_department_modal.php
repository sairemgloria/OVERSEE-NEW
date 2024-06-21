<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Department Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="./includes/add_department.php" autocomplete="off" onSubmit="return valid();" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="department_name" class="control-label">Department Name</label>
                <input type="text" class="form-control" name="DEPARTMENT_NAME" placeholder="Department Name" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="time_in" class="control-label">Time In</label>
                <input type="time" class="form-control" name="DEPARTMENT_TIME_IN">
                <div class="input-group-append">
                </div>
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="time_out" class="control-label">Time Out</label>
                <input type="time" class="form-control" name="DEPARTMENT_TIME_OUT">
                <div class="input-group-append">
                </div>
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="overtime" class="control-label">Overtime</label>
                <input type="time" class="form-control" name="DEPARTMENT_OVERTIME">
                <div class="input-group-append">
                </div>
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
