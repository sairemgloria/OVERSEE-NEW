<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Employee Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <!-- <a href="../includes/add_employee.php"></a> -->
        <form class="form-horizontal" method="POST" action="./includes/add_employee.php" autocomplete="off" onSubmit="return valid();" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="firstname" class="control-label">First Name</label>
                <input type="text" class="form-control" name="FNAME" placeholder="First Name" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="middlename" class="control-label">Middle Name</label>
                <input type="text" class="form-control" name="MI" placeholder="Middle Name" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="lastname" class="control-label">Last Name</label>
                <input type="text" class="form-control" name="LNAME" placeholder="Last Name" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="emailaddress" class="control-label">Email Address</label>
                <input type="email" class="form-control" id="email" onBlur="userChecked()" name="EMAIL" placeholder="sample@oversee.com">
                <span id="available"></span>
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
                <label for="contact" class="control-label">Contact No.</label>
                <input type="text" class="form-control" name="CONTACT" placeholder="Contact Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 20)" maxlength="20">
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="dateofbirth" class="control-label">Date of Birth</label>
                <input type="date" class="form-control" name="DATE_OF_BIRTH">
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="gender" class="control-label">Gender</label>
                <select name="GENDER" class="form-control">
                  <option value="" disabled selected>Select gender</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="civilstatus" class="control-label">Civil Status</label>
                <select name="CIVIL_STATUS" class="form-control">
                  <option value="" disabled selected>Select status</option>
                  <option>Single</option>
                  <option>Married</option>
                  <option>Divorced</option>
                  <option>Separated</option>
                  <option>Widowed</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="nationality" class="control-label">Nationality</label>
                <select class="form-control" name="NATIONALITY">
                  <option value="" disabled selected>Select nationality</option>
                  <?php include("selecting_nationality.php"); ?>
                </select>
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="department" class="control-label">Department</label>
                <select name="DEPARTMENT" class="form-control">
                  <option value="" disabled selected>Select department</option>
                  <?php include("selecting_department.php"); ?>
                </select>
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="role" class="control-label">Role</label>
                <select name="ROLE_NAME" class="form-control">
                  <option value="" disabled selected> Select role</option>
                  <?php include("selecting_role.php"); ?>
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
        <button type="submit" id="submit" name="SUBMIT" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- The script here below is to check valid email in the database -->
<script src="assets/js/employee_email_check_availability.js"></script>