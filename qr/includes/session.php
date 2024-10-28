<?php

session_start();
include('conn.php');


if (!isset($_SESSION['qr']) OR empty($_SESSION['qr'])) {
   header("Location: ../qrlogin.php");
   exit();
}

$qr_ID = $_SESSION['qr'];
$sql = "SELECT * FROM qr WHERE ID='$qr_ID'";
$query = $conn->query($sql);

if (!$query) {
   die("Error: ". $conn->error);
}

$qrAcc = $query->fetch_assoc();