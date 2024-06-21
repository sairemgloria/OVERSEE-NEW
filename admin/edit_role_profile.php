<?php
include("includes/session.php");
include("templates/header.php");
include("templates/navbar.php");
include("templates/sidebar.php");

if (isset($_GET["q"])) {
    $sql = "SELECT * FROM roles WHERE ID='" . $_GET["q"] . "'";
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
                <h1 class="my-0 my-md-3 my-lg-3 fw-bold"><span class="dashboard-span fw-bold">|</span> Edit Role</h1>
            </div>
            <div class="col-sm-6" id="breadcrumb-align-center">
                <ol class="breadcrumb float-sm-right my-0 my-md-3 my-lg-3">
                    <li class="breadcrumb-item"><a href="role.php" style="text-decoration: none;">Role Records</a></li>
                    <li class="breadcrumb-item active">Edit Role</li>
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
                        <?= $row["ROLE_NAME"]; ?>'s Profile</h5>
                    <div class="card-body align-items-center justify-content-center">
                        <form class="form-horizontal" method="POST" action="./includes/update_role_profile.php" autocomplete="off" onSubmit="return valid();" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="ID" value="<?= $row['ID']; ?>">
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="role_name" class="control-label">Role Name</label>
                                    <input type="text" class="form-control" name="ROLE_NAME" placeholder="Role Name" value="<?= $row['ROLE_NAME']; ?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                                </div>
                            </div>

                            <!-- <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="department_designated" class="control-label">Department Designated</label>
                                    <input type="text" class="form-control" name="DEPT_DESIGNATED" placeholder="Department Designated" value="<?= $row['DEPT_DESIGNATED']; ?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                                </div>
                            </div> -->

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="department_designated" class="control-label">Department Designated</label>
                                    <select name="DEPT_DESIGNATED" class="form-control">
                                        <option disabled selected value="<?= $row['DEPT_DESIGNATED']; ?>"><?= $row['DEPT_DESIGNATED']; ?> (Current
                                            selected)</option>
                                        <?php include("includes/selecting_department.php"); ?>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer p-3">
                        <a href="role.php"><button type="button" class="btn btn-secondary">Return</button></a>
                        <button type="submit" name="UPDATE" class="btn btn-success">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("templates/footer.php"); ?>