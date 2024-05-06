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
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- added breadcrumb features -->
        <!-- <h1 class="dashboard my-4 fw-bold"><span class="dashboard-span fw-bold">|</span> Dashboard</h1> -->
        <hr class="hr-element">
        <div class="col-sm-12">
            <div class="row gap-4 p-3 justify-content-evenly">
                <div class="card border-success mb-auto p-0">
                    <div class="display-cards">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM admins";
                            $query = $conn->query($sql);
                            ?>
                            <h1 class="card-title"><?= $query->num_rows; ?></h1>
                            <p class="card-text">Admins</p>
                        </div>
                        <i class="material-icons" id="logo-display">manage_accounts</i>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <a href="#" class="text-dark" style="text-decoration: none;">More info <i class="material-icons" id="material-icon">arrow_circle_right</i></a>
                    </div>
                </div>
                <div class="card border-success mb-auto p-0">
                    <div class="display-cards">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM admins";
                            $query = $conn->query($sql);
                            ?>
                            <h1 class="card-title"><?= $query->num_rows; ?></h1>
                            <p class="card-text">Admins</p>
                        </div>
                        <i class="material-icons" id="logo-display">manage_accounts</i>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <a href="#" class="text-dark" style="text-decoration: none;">More info <i class="material-icons" id="material-icon">arrow_circle_right</i></a>
                    </div>
                </div>
                <div class="card border-success mb-auto p-0">
                    <div class="display-cards">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM admins";
                            $query = $conn->query($sql);
                            ?>
                            <h1 class="card-title"><?= $query->num_rows; ?></h1>
                            <p class="card-text">Admins</p>
                        </div>
                        <i class="material-icons" id="logo-display">manage_accounts</i>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <a href="#" class="text-dark" style="text-decoration: none;">More info <i class="material-icons" id="material-icon">arrow_circle_right</i></a>
                    </div>
                </div>
                <div class="card border-success mb-auto p-0">
                    <div class="display-cards">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM admins";
                            $query = $conn->query($sql);
                            ?>
                            <h1 class="card-title"><?= $query->num_rows; ?></h1>
                            <p class="card-text">Admins</p>
                        </div>
                        <i class="material-icons" id="logo-display">manage_accounts</i>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <a href="#" class="text-dark" style="text-decoration: none;">More info <i class="material-icons" id="material-icon">arrow_circle_right</i></a>
                    </div>
                </div>
            </div>
        </div>

        <p class="sample-text pt-4">This is a responsive Bootstrap 5 admin template. The sidebar transforms into a top navbar on smaller screens.</p>
        <p class="sample-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe consequatur, maxime ullam in veniam velit aspernatur esse tenetur voluptas odio temporibus dignissimos voluptatem iste similique minus dolore fugit beatae sapiente.
            Dolor fuga voluptatibus, ipsa deserunt eius officia blanditiis optio in nesciunt doloremque illum accusamus odio iure, praesentium, consectetur hic esse tempore! Suscipit consectetur neque officia recusandae magni, atque distinctio sapiente.</p>
    </div>
</div>

<?php include("templates/footer.php"); ?>