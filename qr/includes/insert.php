<?php

include('conn.php');
date_default_timezone_set("Asia/Manila");

if ($conn->connect_error) {
   die("Connection failed" . $conn->connect_error);
}

if (isset($_POST['EMP_KEY'])) {
   $empKey = $_POST['EMP_KEY'];
   $date = date('Y-m-d');
   $time = date('H:i:s');
   $timeQuery = "SELECT DEPARTMENT_TIME_IN, DEPARTMENT_TIME_OUT FROM departments";
   $timeResult = $conn->query($timeQuery);

   if ($timeResult && $timeResult->num_rows > 0) {
      $timeRow = $timeResult->fetch_assoc();
      $departmentTimeIn = $timeRow['DEPARTMENT_TIME_IN'];
      $departmentTimeOut = $timeRow['DEPARTMENT_TIME_OUT'];

      // Condition for AM Time In
      $onTime = "On Time";
      $notOnTime = "Late";
      if ($time >= $departmentTimeIn) {
         $TimeInMark = $notOnTime;
      } else {
         $TimeInMark = $onTime;
      }

      // Condition for PM Time Out
      $underTime = "Under Time";
      $onOutTime = "Out";
      $setOverTime = "Overtime";
      if ($time <= $departmentTimeOut) {
         $TimeOutMark = $underTime;
      } else {
         $TimeOutMark = $onOutTime;
      }

      $sql = "SELECT FNAME, MI, LNAME, OT FROM employees WHERE EMP_KEY = '$empKey'";
      $result = $conn->query($sql);

      if ($result && $result->num_rows > 0) {
         // Employee with EMP_KEY exists, so we can fetch the data.
         $row = $result->fetch_assoc();
         $fname = $row['FNAME'];
         $mi = $row['MI'];
         $lname = $row['LNAME'];
         $overtime = $row['OT'];
         $empName = $fname . ' ' . $mi . ' ' . $lname;
         $currentTime = date('H:i:s'); // Retrieve current time

         $sql = "SELECT STATUS FROM attendance WHERE EMP_NAME = '$empName' AND CURRENTDATE = '$date'";
         $query = $conn->query($sql);

         if ($query && $query->num_rows > 0) {
            $row = $query->fetch_assoc();
            $status = $row['STATUS'];

            if ($status === '0' && $overtime === 'Activated') {
               $sql = "UPDATE attendance SET PMLOGOUT='$currentTime', PMLOGOUT_STATUS='$setOverTime', STATUS='1' WHERE EMP_NAME='$empName' AND CURRENTDATE='$date'";
               $result = $conn->query($sql);
               if ($result) {
                  $_SESSION['success'] = 'Time out recorded successfully!';
               } else {
                  $_SESSION['error'] = 'An error occurred while updating the attendance!';
               }
            } elseif ($status === '0' && $overtime != 'Activated') {
               $sql = "UPDATE attendance SET PMLOGOUT='$currentTime', PMLOGOUT_STATUS='$TimeOutMark', STATUS='1' WHERE EMP_NAME='$empName' AND CURRENTDATE='$date'";
               $result = $conn->query($sql);
               if ($result) {
                  $_SESSION['success'] = 'Time out recorded successfully!';
               } else {
                  $_SESSION['error'] = 'An error occurred while updating the attendance!';
               }
            } else {
               $_SESSION['error'] = 'Attendance already recorded for the day!';
            }
         } else {
            $sql = "INSERT INTO attendance(EMP_NAME, AMLOGIN, AMLOGIN_STATUS, PMLOGOUT, PMLOGOUT_STATUS, CURRENTDATE, STATUS) VALUES ('$empName', '$currentTime', '$TimeInMark', '00:00:00', 'No Entry', '$date', '0')";
            $result = $conn->query($sql);
            if ($result) {
               $_SESSION['success'] = 'Time in recorded successfully!';
            } else {
               $_SESSION['error'] = 'An error occurred while inserting the attendance!';
            }
         }
      } else {
         $_SESSION['error'] = 'Employee key does not exist in the database!';
      }
   } else {
      $_SESSION['error'] = 'An error occurred while retrieving department time data!';
   }
} else {
   $_SESSION['error'] = 'Please provide valid employee key';
}

header("location: ../dashboard.php");
$conn->close();
