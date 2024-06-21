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
                <h1 class="my-0 my-md-3 my-lg-3 fw-bold"><span class="dashboard-span fw-bold">|</span> View Department</h1>
            </div>
            <div class="col-sm-6" id="breadcrumb-align-center">
                <ol class="breadcrumb float-sm-right my-0 my-md-3 my-lg-3">
                    <li class="breadcrumb-item"><a href="department.php" style="text-decoration: none;">Department Records</a></li>
                    <li class="breadcrumb-item active">View Department</li>
                </ol>
            </div>
        </div>
        <!-- added breadcrumb features -->
        <hr class="hr-element">
        <div class="table-responsive">
            <div class="col-md-12 pt-4">
                <div class="card w-100">
                    <h5 class="card-header p-3"><i class="material-icons" id="material-icon">info</i> <?= $row["DEPARTMENT_NAME"]; ?>'s Profile</h5>
                    <div class="card-body d-flex align-items-center justify-content-center">
                    <table class="table table-bordered">
                        <tr>
                            <td width="150">ID</td>
                            <td width="400"><?= $row["ID"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Department Name</td>
                            <td width="400"><?= $row["DEPARTMENT_NAME"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Time In</td>
                            <td width="400"><?= $row["DEPARTMENT_TIME_IN"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Time Out</td>
                            <td width="400"><?= $row["DEPARTMENT_TIME_OUT"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Overtime</td>
                            <td width="400"><?= $row["DEPARTMENT_OVERTIME"]; ?></td>
                        </tr>
                    </table>
                    </div>
                    <div class="card-footer p-3">
                        <a href="department.php"><button type="button" class="btn btn-secondary">Return</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("templates/footer.php"); ?>