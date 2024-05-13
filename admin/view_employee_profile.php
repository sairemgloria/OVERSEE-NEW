<?php
include("includes/session.php");
include("templates/header.php");
include("templates/navbar.php");
include("templates/sidebar.php");

if (isset($_GET["q"])) {
    $sql = "SELECT * FROM employees WHERE ID='" . $_GET["q"] . "'";
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
                <h1 class="my-0 my-md-3 my-lg-3 fw-bold"><span class="dashboard-span fw-bold">|</span> View Employee Profile</h1>
            </div>
            <div class="col-sm-6" id="breadcrumb-align-center">
                <ol class="breadcrumb float-sm-right my-0 my-md-3 my-lg-3">
                    <li class="breadcrumb-item"><a href="dashboard.php" style="text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item active">View Employee Profile</li>
                </ol>
            </div>
        </div>
        <!-- added breadcrumb features -->
        <hr class="hr-element">
        <div class="table-responsive">
            <div class="col-md-12 pt-4">
                <div class="card w-100">
                    <h5 class="card-header p-3"><i class="material-icons" id="material-icon">info</i> <?= $row["FNAME"] . " " . $row["LNAME"]; ?>'s Profile</h5>
                    <div class="card-body d-flex align-items-center justify-content-center">
                    <table class="table table-bordered">
                        <tr>
                            <td width="150">ID</td>
                            <td width="400"><?= $row["ID"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Display Profile</td>
                            <td width="400"><img src="./assets/images/<?= empty($row["PROFILE"]) ? "default.jpg" : "../uploads/" . $row["PROFILE"]; ?>" width="50" height="50" alt="..."></td>
                        </tr>
                        <tr>
                            <td width="150">Name</td>
                            <td width="400"><?= $row["FNAME"] . " " . $row["MI"] . " " . $row["LNAME"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Email</td>
                            <td width="400"><?= $row["EMAIL"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Contact</td>
                            <td width="400"><?= $row["CONTACT"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Date of Birth</td>
                            <td width="400"><?= $row["DATE_OF_BIRTH"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Gender</td>
                            <td width="400"><?= $row["GENDER"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Civil Status</td>
                            <td width="400"><?= $row["CIVIL_STATUS"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Nationality</td>
                            <td width="400"><?= $row["NATIONALITY"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Department</td>
                            <td width="400"><?= $row["DEPARTMENT"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Role</td>
                            <td width="400"><?= $row["ROLE"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Overtime</td>
                            <td width="400"><?= $row["OT"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Total Worked Hours</td>
                            <td width="400">Empty</td>
                        </tr>
                        <tr>
                            <td width="150">Account Type</td>
                            <td width="400"><?= $row["TYPE"]; ?></td>
                        </tr>
                    </table>
                    </div>
                    <div class="card-footer p-3">
                        <a href="employee.php"><button type="button" class="btn btn-secondary">Return</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("templates/footer.php"); ?>