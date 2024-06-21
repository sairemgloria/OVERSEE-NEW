<?php
include("includes/session.php");
include("templates/header.php");
include("templates/navbar.php");
include("templates/sidebar.php");

if (isset($_GET["q"])) {
    $sql = "SELECT * FROM departments WHERE ID='" . $_GET["q"] . "'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        $row = $query->fetch_assoc();
    }
}
?>

<!-- Page Content -->
<div id="content">
    <div class="container-fluid">
        <!-- added breadcrumb features -->
        <div class="row">
            <div class="col-sm-6">
                <h1 class="my-0 my-md-3 my-lg-3 fw-bold"><span class="dashboard-span fw-bold">|</span> Edit Department</h1>
            </div>
            <div class="col-sm-6" id="breadcrumb-align-center">
                <ol class="breadcrumb float-sm-right my-0 my-md-3 my-lg-3">
                    <li class="breadcrumb-item"><a href="department.php" style="text-decoration: none;">Department Records</a></li>
                    <li class="breadcrumb-item active">Edit Department</li>
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
                        <?= $row["DEPARTMENT_NAME"]; ?>'s Profile</h5>
                    <div class="card-body align-items-center justify-content-center">
                        <form class="form-horizontal" method="POST" action="./includes/update_department_profile.php" autocomplete="off" onSubmit="return valid();" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="ID" value="<?= $row['ID']; ?>">
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="department_name" class="control-label">Department Name</label>
                                    <input type="text" class="form-control" name="DEPARTMENT_NAME" placeholder="Department Name" value="<?= $row['DEPARTMENT_NAME']; ?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="department_time_in" class="control-label">Time In</label>
                                    <input type="time" class="form-control" name="DEPARTMENT_TIME_IN" placeholder="" value="<?= $row['DEPARTMENT_TIME_IN']; ?>">
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="department_time_out" class="control-label">Time Out</label>
                                    <input type="time" class="form-control" name="DEPARTMENT_TIME_OUT" placeholder="" value="<?= $row['DEPARTMENT_TIME_OUT']; ?>">
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="department_overtime" class="control-label">Overtime</label>
                                    <input type="time" class="form-control" name="DEPARTMENT_OVERTIME" placeholder="" value="<?= $row['DEPARTMENT_OVERTIME']; ?>">
                                </div>
                            </div>
                            
                    </div>
                    <div class="card-footer p-3">
                        <a href="department.php"><button type="button" class="btn btn-secondary">Return</button></a>
                        <button type="submit" name="UPDATE" class="btn btn-success">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("templates/footer.php"); ?>