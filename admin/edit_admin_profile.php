<?php
include("includes/session.php");
include("templates/header.php");
include("templates/navbar.php");
include("templates/sidebar.php");

if (isset($_GET["q"])) {
    $sql = "SELECT * FROM admins WHERE ID='" . $_GET["q"] . "'";
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
                <h1 class="my-0 my-md-3 my-lg-3 fw-bold"><span class="dashboard-span fw-bold">|</span> Edit Admin</h1>
            </div>
            <div class="col-sm-6" id="breadcrumb-align-center">
                <ol class="breadcrumb float-sm-right my-0 my-md-3 my-lg-3">
                    <li class="breadcrumb-item"><a href="admin.php" style="text-decoration: none;">Admin Records</a></li>
                    <li class="breadcrumb-item active">Edit Admin</li>
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
                        <?= $row["NAME"]; ?>'s Profile</h5>
                    <div class="card-body align-items-center justify-content-center">
                        <form class="form-horizontal" method="POST" action="./includes/update_admin_profile.php" autocomplete="off" onSubmit="return valid();" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="ID" value="<?= $row['ID']; ?>">
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="username" class="control-label">Username</label>
                                    <input type="text" class="form-control" name="USERNAME" placeholder="Username" value="<?= $row['USERNAME']; ?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <input type="password" class="form-control" name="PASSWORD" placeholder="Password" value="<?= $row['PASSWORD']; ?>">
                                    <div class="input-group-append">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" class="form-control" name="NAME" placeholder="Name" value="<?= $row['NAME']; ?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="role" class="control-label">Role</label>
                                    <select name="ROLE" class="form-control">
                                        <option selected value="<?= $row['ROLE']; ?>"><?= $row['ROLE']; ?> (Current
                                            selected)</option>
                                            <option value="SysAdmin"">System Administrator</option>
                                            <?php include("includes/selecting_department.php"); ?>
                                    </select>
                                </div>
                            </div>

                            <div class=" col-sm-12 mb-3">
                                            <div class="form-group">
                                                <label for="profile" class="control-label">Profile</label>
                                                <input type="file" class="form-control" name="PROFILE" value="<?= $row['PROFILE']; ?>">
                                            </div>
                                </div>
                            </div>
                            <div class="card-footer p-3">
                                <a href="admin.php"><button type="button" class="btn btn-secondary">Return</button></a>
                                <button type="submit" name="UPDATE" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("templates/footer.php"); ?>