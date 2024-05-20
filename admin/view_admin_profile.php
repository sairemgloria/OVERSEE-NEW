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
                <h1 class="my-0 my-md-3 my-lg-3 fw-bold"><span class="dashboard-span fw-bold">|</span> View Admin Profile</h1>
            </div>
            <div class="col-sm-6" id="breadcrumb-align-center">
                <ol class="breadcrumb float-sm-right my-0 my-md-3 my-lg-3">
                    <li class="breadcrumb-item"><a href="admin.php" style="text-decoration: none;">Admin Records</a></li>
                    <li class="breadcrumb-item active">View Admin Profile</li>
                </ol>
            </div>
        </div>
        <!-- added breadcrumb features -->
        <hr class="hr-element">
        <div class="table-responsive">
            <div class="col-md-12 pt-4">
                <div class="card w-100">
                    <h5 class="card-header p-3"><i class="material-icons" id="material-icon">info</i> <?= $row["NAME"]; ?>'s Profile</h5>
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
                            <td width="150">Username</td>
                            <td width="400"><?= $row["USERNAME"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Name</td>
                            <td width="400"><?= $row["NAME"]; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Role</td>
                            <td width="400"><?= $row["ROLE"]; ?></td>
                        </tr>
                    </table>
                    </div>
                    <div class="card-footer p-3">
                        <a href="admin.php"><button type="button" class="btn btn-secondary">Return</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("templates/footer.php"); ?>