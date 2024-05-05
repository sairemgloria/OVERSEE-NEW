<?php
session_start(); // THIS CODE IS FOR THE LOGIN NOTIFICATION IF VALID USER OR NOT. 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OverSEE | Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> <!-- bootstrap 5 -->
  <link rel="stylesheet" href="assets/css/admin_login.css" type="text/css"> <!-- external CSS -->
  <link rel="icon" type="image/x-icon" href="assets/images/logo.png"> <!-- logo -->
</head>

<body>

  <div class="container-fluid p-0">
    <div class="row" id="content">
      <div class="col-md-5 d-md-block d-none bg-none p-0">
        <div class="display-image" style="background: linear-gradient(rgba(242, 192, 135, 0.55), rgba(168, 78, 51, 0.75)), url('assets/images/mrwsdp.jpg'); height: 100%; width: 100%; background-size: cover;">
        </div>
      </div>
      <div class="col-md-7 bg-white text-black">
        <div class="mycontent">
          <h2><span class="dashboard-span fw-bold">|</span> Admin <span>Portal</span></h2>
          <h5 class="oversee-h5">Sign in to proceed Administrator Dashboard</h5>
          <?php if (isset($_SESSION["error"])) {
            echo '<div class="alert alert-danger font-small mb-4">' . $_SESSION["error"] . '</div>';
            unset($_SESSION["error"]); // CLEAR THE ERROR MESSAGE AFTER DISPLAYING IT
          } ?>
          <form action="includes/admin_check_login.php" method="POST" autocomplete="off">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="USERNAME" class="form-control" placeholder="eg. admin">
            </div>
            <div class="mb-5">
              <label class="form-label">Password</label>
              <input type="password" name="PASSWORD" class="form-control" placeholder="eg. ********">
            </div>
            <div class="container p-0 text-center text-lg-start">
              <button type="submit" name="login" class="btn btn-teal btn-lg px-5 mb-4 mb-md-4 mb-lg-0">Log In</button>
              <a href="../qr/qrlogin.php" class="ms-lg-4 mt-3 mt-lg-0">Switch to QR Scanner</a>
            </div>
          </form>
          <hr class="mt-5">
          <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3 text-muted" style="background-color: rgba(0, 0, 0, 0.1); user-select: none;">
              © <?php echo date("Y"); ?> Copyright:
              <a class="text-muted" href="#" style="user-select: none;">BSIT - AU SG</a>
            </div>
            <!-- Copyright -->
          </footer>
          <p class="pt-3 pt-sm-2 pt-md-3 pt-lg-4 text-center text-md-start" style="pointer-events: none; user-select: none;">REY Marketing Compound, C. Raymundo Avenue, Rosario, Pasig, 1609<br><br>Contact Us: (02) 8641 6196</p>
        </div>
      </div>
    </div>
  </div>

  <!-- bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>

</body>

</html>