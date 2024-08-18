<!-- Navbar -->
<nav class="navbar navbar-expand-lg d-lg-none" id="navbarTop">
    <div class="container-fluid">
        <button type="button" id="navbar-toggler" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse p-2" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-items m-1">
                    <a class="nav-link active" href="user_dashboard.php">Dashboard</a>
                </li>
                <li class="nav-items m-1">
                    <a class="nav-link active" href="user_dashboard.php">Profile</a>
                </li>
                <li class="nav-items m-1">
                    <a class="nav-link active" href="myattendance.php">My Attendance</a>
                </li>
                <li class="nav-items m-1">
                    <!-- added toggle drop down button -->
                    <div class="dropdown" id="">
                        <a class="dropdown-toggle" href="#" id="dropdownMenu2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $userAcc["FNAME"] . " " . $userAcc["LNAME"]; ?> Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a class="dropdown-item" href="#">Edit Information</a></li>
                            <li><a class="dropdown-item" href="#">Update Profile</a></li>
                            <li><a class="dropdown-item" href="#" role="switch" id="flexSwitchCheckChecked" checked onclick="myFunction()">Light / Dark Mode</a></li>
                            <li><a class="dropdown-item" href="includes/#">Sign Out</a></li>
                        </ul>
                    </div>
                    <!-- added toggle drop down button -->
                </li>
            </ul>
        </div>
    </div>
</nav>