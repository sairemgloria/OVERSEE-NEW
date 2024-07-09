<?php
include("includes/session.php");
include("templates/header.php");
include("templates/navbar.php");
include("templates/sidebar.php");

if (isset($_GET["q"])) {
    $employeeId = $conn->real_escape_string($_GET['q']);
    $sql = "SELECT employees.*, attendance.EMP_NAME, attendance.AMLOGIN, attendance.AMLOGIN_STATUS, attendance.PMLOGOUT, attendance.PMLOGOUT_STATUS, CURRENTDATE, STATUS 
            FROM employees 
            INNER JOIN attendance ON attendance.EMP_NAME = CONCAT(employees.FNAME, ' ', employees.MI, ' ', employees.LNAME) 
            WHERE employees.ID = '$employeeId'";
    $query = $conn->query($sql);

    if ($query && $query->num_rows > 0) {
        $row = $query->fetch_assoc();
    } else {
        // Handle the case where no matching records are found or query fails
        $row = null;
        echo "No records found or query failed.";
    }
}
?>

<!-- Page Content -->
<div id="content">
    <div class="container-fluid">
        <!-- added breadcrumb features -->
        <div class="row">
            <div class="col-sm-6">
                <h1 class="my-0 my-md-3 my-lg-3 fw-bold"><span class="dashboard-span fw-bold">|</span> View Attendance</h1>
            </div>
            <div class="col-sm-6" id="breadcrumb-align-center">
                <ol class="breadcrumb float-sm-right my-0 my-md-3 my-lg-3">
                    <li class="breadcrumb-item"><a href="attendance.php" style="text-decoration: none;">Attendance Records</a></li>
                    <li class="breadcrumb-item active">View Attendance</li>
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
                    <h5 class="card-header p-3"><i class="material-icons" id="material-icon">info</i> <?= $row["FNAME"] . " " . $row["LNAME"]; ?>'s Attendance</h5>
                    <div class="card-body align-items-center justify-content-center">
                        <div class="btn-group my-3">
                            <?php if ($row) : ?>
                                <a href="./includes/export_excelfile_attendance.php?export=<?= $row['ID']; ?>" class="btn bg-primary btn-sm text-light" id="add-btn"><i class="material-icons" id="material-icon">file_download</i> &nbsp;EXPORT</a>
                                <a href="./includes/clear_attendance.php?q=<?= $row['ID']; ?>" class="btn bg-danger btn-sm text-light" id="export-btn" onClick="return confirm('Are you sure you want to clear the attendance of this employee?');"><i class="material-icons" id="material-icon">delete</i> &nbsp;CLEAR</a>
                            <?php endif; ?>
                        </div>
                        <table id="attendanceTable" class="display table table-responsive">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">#</th>
                                    <th style="text-align: center; vertical-align: middle;">Employee Name</th>
                                    <th style="text-align: center; vertical-align: middle;">Time In</th>
                                    <th style="text-align: center; vertical-align: middle;">In Status</th>
                                    <th style="text-align: center; vertical-align: middle;">Time Out</th>
                                    <th style="text-align: center; vertical-align: middle;">Out Status</th>
                                    <th style="text-align: center; vertical-align: middle;">Log Date</th>
                                    <th style="text-align: center; vertical-align: middle;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include("includes/display_selected_employee_attendance.php"); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">#</th>
                                    <th style="text-align: center; vertical-align: middle;">Employee Name</th>
                                    <th style="text-align: center; vertical-align: middle;">Time In</th>
                                    <th style="text-align: center; vertical-align: middle;">In Status</th>
                                    <th style="text-align: center; vertical-align: middle;">Time Out</th>
                                    <th style="text-align: center; vertical-align: middle;">Out Status</th>
                                    <th style="text-align: center; vertical-align: middle;">Log Date</th>
                                    <th style="text-align: center; vertical-align: middle;">Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-footer p-3">
                        <a href="attendance.php"><button type="button" class="btn btn-secondary">Return</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("templates/footer.php");
?>