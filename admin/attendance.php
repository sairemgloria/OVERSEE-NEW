<?php
include("includes/session.php");
include("templates/header.php");
include("templates/navbar.php");
include("templates/sidebar.php");
?>

<!-- Page Content -->
<div id="content">
    <div class="container-fluid">
        <!-- added breadcrumb features -->
        <div class="row">
            <div class="col-sm-6">
                <h1 class="my-0 my-md-3 my-lg-3 fw-bold"><span class="dashboard-span fw-bold">|</span> Attendance Records</h1>
            </div>
            <div class="col-sm-6" id="breadcrumb-align-center">
                <ol class="breadcrumb float-sm-right my-0 my-md-3 my-lg-3">
                    <li class="breadcrumb-item"><a href="dashboard.php" style="text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item active">Attendance Records</li>
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
            <table id="attendanceTable" class="display table table-responsive">
                <thead>
                    <tr>
                        <th style="text-align: center; vertical-align: middle;">#</th>
                        <th style="text-align: center; vertical-align: middle;">Display Profile</th>
                        <th style="text-align: center; vertical-align: middle;">Name</th>
                        <th style="text-align: center; vertical-align: middle;">Department</th>
                        <th style="text-align: center; vertical-align: middle;">Role</th>
                        <th style="text-align: center; vertical-align: middle;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include("includes/display_all_attendance.php"); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th style="text-align: center; vertical-align: middle;">#</th>
                        <th style="text-align: center; vertical-align: middle;">Display Profile</th>
                        <th style="text-align: center; vertical-align: middle;">Name</th>
                        <th style="text-align: center; vertical-align: middle;">Department</th>
                        <th style="text-align: center; vertical-align: middle;">Role</th>
                        <th style="text-align: center; vertical-align: middle;">Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php
include("templates/footer.php");
?>