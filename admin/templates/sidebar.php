    <!-- Sidebar -->
    <div class="container-fluid p-0" id="sidebar">
        <h3 class="adminpanel"><img src="./assets/images/logo.png" alt="logo" class="img-circle">&nbsp;OverSEE</h3>
        <hr>
        <!-- added toggle drop down button -->
        <div class="dropdown" id="sidebar-dropdown">
            <img src="./assets/images/<?= empty($user["PROFILE"]) ? "default.jpg" : "../uploads/" . $user["PROFILE"]; ?>" width="30" height="30" alt="..." style="border-radius: 50%;">
            <a class="dropdown-toggle" href="#" id="dropdownMenu2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome <?= $user['USERNAME']; ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li><a class="dropdown-item" href="#">Edit Information</a></li>
                <li><a class="dropdown-item" href="#">Update Profile</a></li>
                <li><a class="dropdown-item" href="#" role="switch" id="flexSwitchCheckChecked" checked onclick="myFunction()"> Light / Dark Mode</a></li>
                <li><a class="dropdown-item" href="includes/admin_logout.php">Sign Out</a></li>
            </ul>
        </div>
        <!-- added toggle drop down button -->
        <hr>
        <?php if ($user['ROLE'] == 'SysAdmin' || $user['ROLE'] == 'sysadmin') : ?>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" id="sidebar-link" href="dashboard.php"><i class="material-icons">dashboard</i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sidebar-link" href="attendance.php"><i class="material-icons">calendar_month</i> Attendance</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sidebar-link" href="employee.php"><i class="material-icons">groups</i> Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sidebar-link" href="department.php"><i class="material-icons">map</i> Department</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sidebar-link" href="role.php"><i class="material-icons">build</i> Role</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sidebar-link" href="admin.php"><i class="material-icons">admin_panel_settings</i> Admin</a>
            </li>
        </ul>
        <?php else : ?>
            <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" id="sidebar-link" href="dashboard.php"><i class="material-icons">dashboard</i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sidebar-link" href="attendance.php"><i class="material-icons">calendar_month</i> Attendance</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sidebar-link" href="employee.php"><i class="material-icons">groups</i> Employee</a>
            </li>
        </ul>
        <?php endif; ?>
    </div>