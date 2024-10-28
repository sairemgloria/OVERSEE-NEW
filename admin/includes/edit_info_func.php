<?php

include('session.php');

function checkAdminInfoFields($NAME, $USERNAME)
{
   if (empty($NAME) && empty($USERNAME)) {
      $_SESSION["error"] = "All fields are empty";
   } else if (empty($NAME)) {
      $_SESSION["error"] = "Name field is empty";
   } else if (empty($USERNAME)) {
      $_SESSION["error"] = "Username field is empty";
   }

   if (isset($_SESSION["error"])) {
      header('Location: ../dashboard.php');
      exit();
   }
}

function updateAdminInfo($ID, $NAME, $USERNAME, $PASSWORD, $conn)
{
   // Check if a new password is provided
   if (empty($PASSWORD)) {
      // Update only NAME and USERNAME if PASSWORD is not provided
      $sql = "UPDATE admins SET NAME='$NAME', USERNAME='$USERNAME' WHERE ID = '$ID'";
   } else {
      // Update all fields if PASSWORD is provided
      $sql = "UPDATE admins SET NAME='$NAME', USERNAME='$USERNAME', PASSWORD='$PASSWORD' WHERE ID = '$ID'";
   }

   if ($conn->query($sql)) {
      $_SESSION['success'] = 'Admin information updated successfully!';
      header('Location: ../dashboard.php');
      exit();
   } else {
      echo "Error updating admin";
   }
   $conn->close();
}

if (isset($_POST["update"])) {
   $ID = $_POST['ID'];
   $NAME = $_POST['NAME'];
   $USERNAME = $_POST['USERNAME'];
   $PASSWORD = $_POST['PASSWORD'];

   checkAdminInfoFields($NAME, $USERNAME);
   updateAdminInfo($ID, $NAME, $USERNAME, $PASSWORD, $conn);
}
