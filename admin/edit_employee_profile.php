<?php
include("includes/session.php");
include("templates/header.php");
include("templates/navbar.php");
include("templates/sidebar.php");

if (isset($_GET["q"])) {
    $sql = "SELECT * FROM employees WHERE ID='" . $_GET["q"] . "'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        $emp_row = $query->fetch_assoc();
    }
}
?>

<!-- Page Content -->
<div id="content">
    <div class="container-fluid">
        <!-- added breadcrumb features -->
        <div class="row">
            <div class="col-sm-6">
                <h1 class="my-0 my-md-3 my-lg-3 fw-bold"><span class="dashboard-span fw-bold">|</span> Edit Employee</h1>
            </div>
            <div class="col-sm-6" id="breadcrumb-align-center">
                <ol class="breadcrumb float-sm-right my-0 my-md-3 my-lg-3">
                    <li class="breadcrumb-item"><a href="employee.php" style="text-decoration: none;">Employee Records</a></li>
                    <li class="breadcrumb-item active">Edit Employee</li>
                </ol>
            </div>
        </div>
        <!-- added breadcrumb features -->
        <hr class="hr-element">
        <div class="table-responsive">
            <?php
            // THIS CODE BELOW DISPLAY THE ERROR MESSAGE OF FIELDS ARE NEEDED TO FILLED UP
            include("includes/toast_notification.php");
            ?>
            <div class="col-md-12 pt-4">
                <div class="card w-100">
                    <h5 class="card-header p-3"><i class="material-icons" id="material-icon">info</i>
                        <?= $emp_row["FNAME"] . " " . $emp_row["LNAME"]; ?> Profile</h5>
                    <div class="card-body align-items-center justify-content-center">
                        <form class="form-horizontal" method="POST" action="./includes/update_employee_profile.php" autocomplete="off" onSubmit="return valid();" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="ID" value="<?= $emp_row['ID']; ?>">
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="fname" class="control-label">First Name</label>
                                    <input type="text" class="form-control" name="FNAME" placeholder="First name" value="<?= $emp_row['FNAME']; ?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="mi" class="control-label">Middle Name</label>
                                    <input type="text" class="form-control" name="MI" placeholder="Middle name" value="<?= $emp_row['MI']; ?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="lname" class="control-label">Last Name</label>
                                    <input type="text" class="form-control" name="LNAME" placeholder="Last name" value="<?= $emp_row['LNAME']; ?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                                </div>
                            </div>

                            <div class=" col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="profile" class="control-label">Display Profile</label>
                                    <input type="file" class="form-control" name="PROFILE" value="<?= $emp_row['PROFILE']; ?>">
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="EMAIL" placeholder="sample@oversee.com" value="<?= $emp_row['EMAIL']; ?>" onBlur="userChecked()">
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
                                    <label for="department" class="control-label">Department</label>
                                    <select name="DEPARTMENT" class="form-control">
                                        <option selected value="<?= $emp_row['DEPARTMENT']; ?>"><?= $emp_row['DEPARTMENT']; ?> (Current
                                            selected)</option>
                                        <?php include("includes/selecting_department.php"); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="role" class="control-label">Role</label>
                                    <select class="form-control" name="ROLE">
                                        <option selected value="<?= $emp_row['ROLE']; ?>"><?= $emp_row['ROLE']; ?> (Current
                                            selected)</option>
                                        <?php include("includes/selecting_role.php"); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="contact" class="control-label">Contact No.</label>
                                    <input type="text" class="form-control" name="CONTACT" placeholder="Contact Number" value="<?= $emp_row['CONTACT']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 20)" maxlength="20">
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="dateofbirth" class="control-label">Date of Birth</label>
                                    <input type="date" class="form-control" name="DATE_OF_BIRTH" value="<?= $emp_row['DATE_OF_BIRTH']; ?>">
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="gender" class="control-label">Gender</label>
                                    <select name="GENDER" class="form-control">
                                        <option selected value="<?= $emp_row['GENDER']; ?>"><?= $emp_row['GENDER']; ?> (Current
                                            selected)</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="civilstatus" class="control-label">Civil Status</label>
                                    <select name="CIVIL_STATUS" class="form-control">
                                        <option selected value="<?= $emp_row['CIVIL_STATUS']; ?>"><?= $emp_row['CIVIL_STATUS']; ?> (Current
                                            selected)</option>
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
                                        <option selected value="<?= $emp_row['NATIONALITY']; ?>"><?= $emp_row['NATIONALITY']; ?> (Current
                                            selected)</option>
                                        <?php include("includes/selecting_nationality.php"); ?>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer p-3">
                        <a href="employee.php"><button type="button" class="btn btn-secondary">Return</button></a>
                        <button type="submit" id="submit" name="UPDATE" class="btn btn-success">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The script here below is to check valid email in the database -->
<script src="assets/js/employee_email_check_availability.js"></script>

<?php include("templates/footer.php"); ?>