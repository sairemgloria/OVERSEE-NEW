<?php

include('session.php');

function updateAdminInfo($ID, $NAME, $USERNAME, $PASSWORD, $conn)
{
   $sql = "UPDATE admins SET NAME='$NAME', USERNAME='$USERNAME', PASSWORD='$PASSWORD' WHERE ID = '$ID'";

   if ($conn->query($sql)) {
      $_SESSION['success'] = 'Admin information updated successfully!';
      header('Location: ../dashboard.php');
      exit();
   } else {
      $_SESSION['error'] = 'Admin updating fail';
      header('Location: ../dashboard.php');
      exit();
   }
}

if (isset($_POST['UPDATE'])) {
   $ID = $_POST['ID'];
   $NAME = $_POST['NAME'];
   $USERNAME = $_POST['USERNAME'];
   $PASSWORD = $_POST['PASSWORD'];

   updateAdminInfo($ID, $NAME, $USERNAME, $PASSWORD, $conn);
}
