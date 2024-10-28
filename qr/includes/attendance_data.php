<?php

include('conn.php');

$date = date('Y-m-d');
if ($conn->connect_error) {
   die("Connection failed" . $conn->connect_error);
}
$sql = "SELECT * FROM attendance WHERE DATE(CURRENTDATE) = '$date'";
$query = $conn->query($sql);
$count = 1;
while ($row = $query->fetch_assoc()) {
?>
   <td style="text-align: center; vertical-align: middle;"><?= $count++; ?></td>
   <td style="text-align: center; vertical-align: middle;"><?php echo $row['EMP_NAME']; ?></td>
   <td style="text-align: center; vertical-align: middle;"><?php echo $row['AMLOGIN']; ?></td>
   <!-- <td style="text-align: center; vertical-align: middle; color: green;"><?php echo $row['AMLOGIN_STATUS']; ?></td> -->
   <?php
   $status = $row['AMLOGIN_STATUS'];
   $fontColor = $status === 'On Time' ? 'green' : 'crimson';
   ?>
   <td style="text-align: center; font-weight: bold; vertical-align: middle; color: <?php echo $fontColor; ?>;">
      <?php echo $status; ?>
   </td>
   <td style="text-align: center; vertical-align: middle;"><?php echo $row['PMLOGOUT']; ?></td>
   <!-- <td style="text-align: center; vertical-align: middle; color: blue;"><?php echo $row['PMLOGOUT_STATUS']; ?></td> -->
   <?php
   $underTime = "Under Time";
   $onOutTime = "Out";
   $overTime = "Overtime";

   $status = $row['PMLOGOUT_STATUS'];
   $fontColor = '';

   if ($status === $underTime) {
      $fontColor = 'orange';
   } elseif ($status === $onOutTime) {
      $fontColor = 'teal';
   } elseif ($status === $overTime) {
      $fontColor = 'chocolate';
   } // Add more conditions if needed

   ?>

   <td style="text-align: center; font-weight: bold; vertical-align: middle; color: <?php echo $fontColor; ?>;">
      <?php echo $status; ?>
   </td>
   <td style="text-align: center; vertical-align: middle;"><?php echo $row['CURRENTDATE']; ?></td>
   <td style="text-align: center; vertical-align: middle;"><?php echo $row['STATUS']; ?></td>
   </tr>
<?php
}
?>