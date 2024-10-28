<?php include('./includes/session.php'); ?>
<?php include('./templates/header.php'); ?>
<?php include('./templates/navbar.php'); ?>

<div class="container">
   <div class="row py-5">
      <div class="col-12 col-md-8 col-lg-4 mb-4 mx-md-auto">
         <div class="card" id="divvideo">
            <div class="card-body">
            <?php include('./includes/notification.php'); ?>
               <center>
                  <h5 class="card-title">Scan QR Code</h5>
               </center>
               <hr>
               <video id="preview" width="100%" style="border-radius:5px;"></video>
            </div>
         </div>
      </div>

      <div class="col-12 col-md-auto col-lg-8">
         <form action="./includes/insert.php" method="post" id="divvideo">
            <!-- <div class="card mb-4">
               <div class="card-body">
                  <h5 class="card-title">Employee Code</h5>
                  
               </div>
            </div> -->
            <input type="hidden" name="EMP_KEY" id="text" placeholder="Tap your QR Code for attendance" class="form-control" autofocus readonly>
         </form>

         <div class="card w-100 mb-4" id="divvideo">
            <div class="card-body">
               <div class="table-responsive">
                  <table id="attendanceTable" class="table table-bordered">
                     <thead style="text-align: center; vertical-align: middle; font-weight: bold;">
                        <tr>
                           <td>#</td>
                           <td>EMPLOYEE NAME</td>
                           <td>TIME IN</td>
                           <td>IN STATUS</td>
                           <td>TIME OUT</td>
                           <td>OUT STATUS</td>
                           <td>LOGDATE</td>
                           <td>STATUS</td>
                        </tr>
                     </thead>
                     <tbody>
                        <?php include('./includes/attendance_data.php'); ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>

<?php include('./templates/footer.php'); ?>