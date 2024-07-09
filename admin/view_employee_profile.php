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
                <h1 class="my-0 my-md-3 my-lg-3 fw-bold"><span class="dashboard-span fw-bold">|</span> View Profile</h1>
            </div>
            <div class="col-sm-6" id="breadcrumb-align-center">
                <ol class="breadcrumb float-sm-right my-0 my-md-3 my-lg-3">
                    <li class="breadcrumb-item"><a href="employee.php" style="text-decoration: none;">Employee Records</a></li>
                    <li class="breadcrumb-item active">View Profile</li>
                </ol>
            </div>
        </div>
        <!-- added breadcrumb features -->
        <hr class="hr-element">
        <div class="table-responsive">
            <?php
            // THIS CODE BELOW DISPLAY THE ERROR MESSAGE OF FIELDS ARE NEEDED TO FILLED UP
            if (isset($_SESSION["error"])) {
                echo '<div class="alert alert-danger font-small" style="margin: 0;" id="toastError">' . $_SESSION["error"] . "</div>";
                unset($_SESSION["error"]); // CLEAR THE ERROR MESSAGE AFTER DISPLAYING IT
            }
            // THIS CODE BELOW DISPLAY THE SUCCESS MESSAGE IF THERES NO FIELDS EMPTY AND SUCCESS REGISTERED
            if (isset($_SESSION["success"])) {
                echo '<div class="alert alert-success font-small" style="margin: 0;" id="toastSuccess">' . $_SESSION["success"] . "</div>";
                unset($_SESSION["success"]); // CLEAR THE ERROR MESSAGE AFTER DISPLAYING IT
            }
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 pt-4">
                        <div class="card w-auto">

                            <div class="card-fluid">
                                <div class="text-center mx-4 mt-5">
                                    <img src="./assets/images/<?= empty($row["PROFILE"]) ? "default.jpg" : "../uploads/" . $row["PROFILE"]; ?>" class="img-thumbnail" width="150" height="150" alt="Display Profile">
                                    <br><br>
                                    <div class="d-flex justify-content-center align-items-center text-center">
                                        <a href="#updateEmployeeDisplayProfile" data-bs-toggle="modal" data-bs-target="#myModal" class="text-muted d-flex align-items-center" data-id="<?= $ID; ?>" style="text-decoration: none;">
                                            <i class="material-icons" id="material-icon">add_a_photo</i>
                                            <span>&nbsp;Update Profile</span>
                                        </a>
                                    </div>
                                    <hr>
                                </div>

                                <div class="card-body">
                                    <h3 class="text-center"><?= $row["FNAME"] . " " . $row["MI"] . " " . $row["LNAME"]; ?></h3>
                                    <p class="text-center text-muted">Employee ID #: <?= $row["ID"]; ?></p>

                                    <form method="POST" enctype="multipart/form-data" class="text-center">
                                        <input type="text" class="form-control" name="QRCODE" value='<?= $row['EMP_KEY']; ?>' hidden>
                                        <button type="submit" class="btn btn-primary btn-sm" name="GENERATE"><i class="material-icons" id="material-icon">qr_code</i> Generate QR</button>
                                        <br><br>
                                        <?php include('includes/generate_qrcode.php'); ?>
                                    </form>
                                </div>
                            </div>

                            <!-- <div class="row g-0">
                            <div class="col-md-4">
                                <img src="./assets/images/<?= empty($row["PROFILE"]) ? "default.jpg" : "../uploads/" . $row["PROFILE"]; ?>" class="img-thumbnail" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div> -->
                        </div>
                    </div>

                    <div class="col-lg-9 pt-4">
                        <div class="card w-100">
                            <h5 class="card-header p-3"><i class="material-icons" id="material-icon">info</i> <?= $row["FNAME"] . " " . $row["LNAME"]; ?>'s Profile</h5>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <table class="table table-bordered">
                                    <tr>
                                        <td width="150">Employee ID</td>
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
                                        <td width="150">Account Type</td>
                                        <td width="400"><?= $row["TYPE"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="150">Total Worked Hours</td>
                                        <td width="400">Empty</td>
                                    </tr>
                                    <tr>
                                        <td width="150">Overtime</td>
                                        <td width="400">
                                            <?php
                                            $isActivated = ($row["OT"] === "Activated");
                                            $fontColor = ($isActivated) ? "green" : "gray";
                                            ?>
                                            <form action="includes/update_employee_overtime.php" method="POST" enctype="multipart/form-data" id="OT_FORM">
                                                <!-- Add the ID input field -->
                                                <input type="hidden" name="ID" value="<?= $row["ID"]; ?>">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="OT_SWITCH" name="SWITCH" <?= $isActivated ? "checked" : "" ?>>
                                                    <label class="form-check-label" style="color: <?= $fontColor; ?>">
                                                        <?= $row["OT"]; ?>
                                                    </label>
                                                </div>
                                            </form>
                                        </td>
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
    </div>
</div>

<?php 
include("includes/update_employee_display_profile.php");
include("templates/footer.php");
?>