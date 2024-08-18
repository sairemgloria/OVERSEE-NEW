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
                <h1 class="my-0 my-md-3 my-lg-3 fw-bold"><span class="dashboard-span fw-bold">|</span> My Profile</h1>
            </div>
            <div class="col-sm-6" id="breadcrumb-align-center">
                <ol class="breadcrumb float-sm-right my-0 my-md-3 my-lg-3">
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;"></a> Attendance</li>
                    <li class="breadcrumb-item active">My Profile</li>
                </ol>
            </div>
        </div>
        <!-- added breadcrumb features -->
        <hr class="hr-element">
        <div class="col-sm-12">
            <div class="row gap-4 gap-md-3 gap-sm-5 p-2 justify-content-start">
                <!-- Page Content -->
                <?php include("includes/toast_notification.php"); ?>
                <div class="container-fluid">
                    <div class="table-responsive">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-3 pt-4">
                                    <div class="card w-auto">
                                        <div class="card-fluid">
                                            <div class="text-center mx-4 mt-5">
                                                <img src="./assets/images/<?= empty($userAcc["PROFILE"]) ? "default.jpg" : "../../../admin/assets/uploads/" . $userAcc["PROFILE"]; ?>" class="img-thumbnail" width="150" height="150" alt="Display Profile">
                                                <br><br>
                                                <div class="d-flex justify-content-center align-items-center text-center">
                                                    <a href="#updateUsersDisplayProfile" data-bs-toggle="modal" data-bs-target="#myUploadProfileModal" class="text-muted d-flex align-items-center" data-id="<?= $userACC["ID"]; ?>" style="text-decoration: none;">
                                                        <i class="material-icons" id="material-icon">add_a_photo</i>
                                                        <span>&nbsp;Update Profile</span>
                                                    </a>
                                                </div>
                                                <hr>
                                            </div>

                                            <div class="card-body">
                                                <h3 class="text-center"><?= $userAcc["FNAME"] . " " . $userAcc["MI"] . " " . $userAcc["LNAME"]; ?></h3>
                                                <p class="text-center text-muted">Employee ID #: <?= $userAcc["ID"]; ?></p>

                                                <form method="POST" enctype="multipart/form-data" class="text-center">
                                                    <input type="text" class="form-control" name="QRCODE" value='<?= $userAcc['EMP_KEY']; ?>' hidden>
                                                    <button type="submit" class="btn btn-primary btn-sm" name="GENERATE"><i class="material-icons" id="material-icon">qr_code</i> Generate QR</button>
                                                    <br><br>
                                                    <?php include('includes/generate_qrcode.php'); ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-9 pt-4">
                                    <div class="card w-100">
                                        <h5 class="card-header p-3"><i class="material-icons" id="material-icon">info</i> <?= $userAcc["FNAME"] . " " . $userAcc["LNAME"]; ?>'s Profile</h5>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td width="150">Employee ID</td>
                                                        <td width="400"><?= $userAcc["ID"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150">Display Profile</td>
                                                        <td width="400"><img src="./assets/images/<?= empty($userAcc["PROFILE"]) ? "default.jpg" : "../../../admin/assets/uploads/" . $userAcc["PROFILE"]; ?>" width="50" height="50" alt="..."></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150">Name</td>
                                                        <td width="400"><?= $userAcc["FNAME"] . " " . $userAcc["MI"] . " " . $userAcc["LNAME"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150">Email</td>
                                                        <td width="400"><?= $userAcc["EMAIL"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150">Contact</td>
                                                        <td width="400"><?= $userAcc["CONTACT"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150">Date of Birth</td>
                                                        <td width="400"><?= $userAcc["DATE_OF_BIRTH"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150">Gender</td>
                                                        <td width="400"><?= $userAcc["GENDER"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150">Civil Status</td>
                                                        <td width="400"><?= $userAcc["CIVIL_STATUS"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150">Nationality</td>
                                                        <td width="400"><?= $userAcc["NATIONALITY"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150">Department</td>
                                                        <td width="400"><?= $userAcc["DEPARTMENT"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150">Role</td>
                                                        <td width="400"><?= $userAcc["ROLE"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150">Account Type</td>
                                                        <td width="400"><?= $userAcc["TYPE"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150">Total Worked Hours</td>
                                                        <td width="400">Empty</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150">Overtime</td>
                                                        <td width="400" style="color: <?= ($userAcc['OT'] === 'Activated') ? 'green' : 'gray'; ?>">
                                                            <?= $userAcc["OT"]; ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer p-4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Content -->
            </div>
        </div>
    </div>
</div>

<?php include("includes/update_user_display_profile.php"); ?>
<?php include("templates/footer.php"); ?>