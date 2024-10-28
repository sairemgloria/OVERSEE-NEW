<nav class="navbar navbar-expand-lg bg-body-tertiary">
   <div class="container">
      <a class="navbar-brand" href="#">OverSEE-QR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
         <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Hi, <?php echo $qrAcc['USERNAME']; ?>
               </a>
               <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="./includes/qrlogout.php">Log out</a></li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
</nav>
