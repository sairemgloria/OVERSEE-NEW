    <!-- Sidebar -->
    <div class="container-fluid p-0" id="sidebar">
        <h3 class="userpanel"><img src="assets/images/logo.png" alt="logo" class="img-circle">&nbsp;OverSEE</h3>
        <hr>
        <!-- added toggle drop down button -->
        <div class="dropdown" id="sidebar-dropdown">
            <img src="assets/images/<?= empty($userAcc["PROFILE"]) ? "default.jpg" : "../../../admin/assets/uploads/" . $userAcc["PROFILE"]; ?>" width="30" height="30" alt="..." style="border-radius: 50%;">
            <a class="dropdown-toggle" href="#" id="dropdownMenu2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome <?= $userAcc["FNAME"] . " " . $userAcc["LNAME"]; ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li><a class="dropdown-item" href="#">Edit Information</a></li>
                <li><a class="dropdown-item" href="#">Update Profile</a></li>
                <li><a class="dropdown-item" href="#" role="switch" id="flexSwitchCheckChecked" checked onclick="myFunction()"> Light / Dark Mode</a></li>
                <li><a class="dropdown-item" href="includes/user_logout.php">Sign Out</a></li>
            </ul>
        </div>
        <!-- added toggle drop down button -->
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" id="sidebar-link" href="user_dashboard.php"><i class="material-icons">account_box</i> My Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sidebar-link" href="myattendance.php"><i class="material-icons">calendar_month</i> Attendance</a>
            </li>
        </ul>
    </div>