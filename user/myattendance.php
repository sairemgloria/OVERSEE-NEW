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
            <h1 class="my-0 my-md-3 my-lg-3 fw-bold"><span class="dashboard-span fw-bold">|</span> View Attendance</h1>
         </div>
         <div class="col-sm-6" id="breadcrumb-align-center">
            <ol class="breadcrumb float-sm-right my-0 my-md-3 my-lg-3">
            <li class="breadcrumb-item"><a href="user_dashboard.php" style="text-decoration: none;">My Profile</a></li>
               <li class="breadcrumb-item active">View Attendance</li>
            </ol>
         </div>
      </div>
      <!-- added breadcrumb features -->
      <hr class="hr-element">
      <div class="table-responsive">
         <div class="col-md-12 pt-4">
            <div class="card w-100">
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="attendanceTable" class="display table table-responsive">
                        <thead>
                           <tr>
                              <th style="text-align: center; vertical-align: middle;">#</th>
                              <th style="text-align: center; vertical-align: middle;">Employee Name</th>
                              <th style="text-align: center; vertical-align: middle;">Time In</th>
                              <th style="text-align: center; vertical-align: middle;">In Status</th>
                              <th style="text-align: center; vertical-align: middle;">Time Out</th>
                              <th style="text-align: center; vertical-align: middle;">Out Status</th>
                              <th style="text-align: center; vertical-align: middle;">Log Date</th>
                              <th style="text-align: center; vertical-align: middle;">Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php include("includes/display_employee_attendance.php"); ?>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th style="text-align: center; vertical-align: middle;">#</th>
                              <th style="text-align: center; vertical-align: middle;">Employee Name</th>
                              <th style="text-align: center; vertical-align: middle;">Time In</th>
                              <th style="text-align: center; vertical-align: middle;">In Status</th>
                              <th style="text-align: center; vertical-align: middle;">Time Out</th>
                              <th style="text-align: center; vertical-align: middle;">Out Status</th>
                              <th style="text-align: center; vertical-align: middle;">Log Date</th>
                              <th style="text-align: center; vertical-align: middle;">Status</th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
               <div class="card-footer p-3">
                  <a href="user_dashboard.php"><button type="button" class="btn btn-secondary">Go back</button></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include("includes/update_user_display_profile.php"); ?>
<?php include("templates/footer.php"); ?>