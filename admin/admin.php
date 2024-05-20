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
                <h1 class="my-0 my-md-3 my-lg-3 fw-bold"><span class="dashboard-span fw-bold">|</span> Admin Records</h1>
            </div>
            <div class="col-sm-6" id="breadcrumb-align-center">
                <ol class="breadcrumb float-sm-right my-0 my-md-3 my-lg-3">
                    <li class="breadcrumb-item"><a href="dashboard.php" style="text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item active">Admin Records</li>
                </ol>
            </div>
        </div>
        <!-- added breadcrumb features -->
        <hr class="hr-element">
        <div class="table-responsive">
            <?php
            // THIS CODE BELOW DISPLAY THE ERROR MESSAGE OF FIELDS ARE NEEDED TO FILLED UP
            if (isset($_SESSION["error"])) {
                echo '<div class="alert alert-danger font-small" style="margin: 0;">' . $_SESSION["error"] . "</div>";
                unset($_SESSION["error"]); // CLEAR THE ERROR MESSAGE AFTER DISPLAYING IT
            }
            // THIS CODE BELOW DISPLAY THE SUCCESS MESSAGE IF THERES NO FIELDS EMPTY AND SUCCESS REGISTERED
            if (isset($_SESSION["success"])) {
                echo '<div class="alert alert-success font-small" style="margin: 0;">' . $_SESSION["success"] . "</div>";
                unset($_SESSION["success"]); // CLEAR THE ERROR MESSAGE AFTER DISPLAYING IT
            }
            ?>
            <div class="btn-group my-3">
                <a href="#addAdmin" data-bs-toggle="modal" data-bs-target="#myModal" class="btn bg-success btn-sm text-light" id="add-btn"><i class="material-icons" id="material-icon">person_add_alt</i> &nbsp;REGISTER</a>
            </div>
            <table id="employeeTable" class="display table table-responsive">
                <thead>
                    <tr>
                        <th style="text-align: center; vertical-align: middle;">#</th>
                        <th style="text-align: center; vertical-align: middle;">Display Profile</th>
                        <th style="text-align: center; vertical-align: middle;">Name</th>
                        <th style="text-align: center; vertical-align: middle;">Role</th>
                        <th style="text-align: center; vertical-align: middle;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include("includes/display_all_admin.php"); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th style="text-align: center; vertical-align: middle;">#</th>
                        <th style="text-align: center; vertical-align: middle;">Display Profile</th>
                        <th style="text-align: center; vertical-align: middle;">Name</th>
                        <th style="text-align: center; vertical-align: middle;">Role</th>
                        <th style="text-align: center; vertical-align: middle;">Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php
include("includes/add_admin_modal.php");
include("templates/footer.php");
?>