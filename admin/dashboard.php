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
                <h1 class="my-0 my-md-3 my-lg-3 fw-bold"><span class="dashboard-span fw-bold">|</span> Dashboard</h1>
            </div>
            <div class="col-sm-6" id="breadcrumb-align-center">
                <ol class="breadcrumb float-sm-right my-0 my-md-3 my-lg-3">
                    <li class="breadcrumb-item"><a href="dashboard.php" style="text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- added breadcrumb features -->
        <hr class="hr-element">
        <div class="col-sm-12">
            <div class="row gap-4 gap-md-3 gap-sm-5 p-3 justify-content-start">
                <div class="card border-success mx-lg-3 p-0" id="cards">
                    <div class="display-cards">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM employees";
                            $query = $conn->query($sql);
                            ?>
                            <h1 class="card-title"><?= $query->num_rows; ?></h1>
                            <p class="card-text">Employee</p>
                        </div>
                        <i class="material-icons" id="logo-display">groups</i>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <a href="employee.php" class="text-success" style="text-decoration: none;">More info <i class="material-icons" id="material-icon">arrow_circle_right</i></a>
                    </div>
                </div>
                <div class="card border-success mx-lg-3 p-0" id="cards">
                    <div class="display-cards">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM employees WHERE GENDER='MALE'";
                            $query = $conn->query($sql);
                            ?>
                            <h1 class="card-title"><?= $query->num_rows; ?></h1>
                            <p class="card-text">Male Employee</p>
                        </div>
                        <i class="material-icons" id="logo-display">man</i>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <a href="#" class="text-success" style="text-decoration: none;">More info <i class="material-icons" id="material-icon">arrow_circle_right</i></a>
                    </div>
                </div>
                <div class="card border-success mx-lg-3 p-0" id="cards">
                    <div class="display-cards">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM employees WHERE GENDER='FEMALE'";
                            $query = $conn->query($sql);
                            ?>
                            <h1 class="card-title"><?= $query->num_rows; ?></h1>
                            <p class="card-text">Female Employee</p>
                        </div>
                        <i class="material-icons" id="logo-display">woman</i>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <a href="#" class="text-success" style="text-decoration: none;">More info <i class="material-icons" id="material-icon">arrow_circle_right</i></a>
                    </div>
                </div>
                <div class="card border-success mx-lg-3 p-0" id="cards">
                    <div class="display-cards">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM attendance";
                            $query = $conn->query($sql);
                            ?>
                            <h1 class="card-title"><?= $query->num_rows; ?></h1>
                            <p class="card-text">Attendance</p>
                        </div>
                        <i class="material-icons" id="logo-display">calendar_month</i>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <a href="#" class="text-success" style="text-decoration: none;">More info <i class="material-icons" id="material-icon">arrow_circle_right</i></a>
                    </div>
                </div>
                <div class="card border-success mx-lg-3 p-0" id="cards">
                    <div class="display-cards">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM departments";
                            $query = $conn->query($sql);
                            ?>
                            <h1 class="card-title"><?= $query->num_rows; ?></h1>
                            <p class="card-text">Department</p>
                        </div>
                        <i class="material-icons" id="logo-display">map</i>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <a href="#" class="text-success" style="text-decoration: none;">More info <i class="material-icons" id="material-icon">arrow_circle_right</i></a>
                    </div>
                </div>
                <div class="card border-success mx-lg-3 p-0" id="cards">
                    <div class="display-cards">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM roles";
                            $query = $conn->query($sql);
                            ?>
                            <h1 class="card-title"><?= $query->num_rows; ?></h1>
                            <p class="card-text">Role</p>
                        </div>
                        <i class="material-icons" id="logo-display">build</i>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <a href="#" class="text-success" style="text-decoration: none;">More info <i class="material-icons" id="material-icon">arrow_circle_right</i></a>
                    </div>
                </div>
                <div class="card border-success mx-lg-3 p-0" id="cards">
                    <div class="display-cards">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM admins";
                            $query = $conn->query($sql);
                            ?>
                            <h1 class="card-title"><?= $query->num_rows; ?></h1>
                            <p class="card-text">Admin</p>
                        </div>
                        <i class="material-icons" id="logo-display">admin_panel_settings</i>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <a href="admin.php" class="text-success" style="text-decoration: none;">More info <i class="material-icons" id="material-icon">arrow_circle_right</i></a>
                    </div>
                </div>
            </div>
        </div>

        <hr class="hr-element">

        <p class="sample-text pt-4">This is a responsive Bootstrap 5 admin template. The sidebar transforms into a top navbar on smaller screens.</p>
        <p class="sample-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe consequatur, maxime ullam in veniam velit aspernatur esse tenetur voluptas odio temporibus dignissimos voluptatem iste similique minus dolore fugit beatae sapiente.
            Dolor fuga voluptatibus, ipsa deserunt eius officia blanditiis optio in nesciunt doloremque illum accusamus odio iure, praesentium, consectetur hic esse tempore! Suscipit consectetur neque officia recusandae magni, atque distinctio sapiente.</p>
    </div>
</div>

<?php include("templates/footer.php"); ?>