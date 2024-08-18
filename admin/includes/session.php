<?php

session_start();
include("conn.php");

if (!isset($_SESSION['admin']) or empty($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$admin_ID = $_SESSION['admin'];
$sql = "SELECT * FROM admins WHERE ID='$admin_ID'";
$query = $conn->query($sql);

if (!$query) {
    die("Error: " . $conn->error);
}

$user = $query->fetch_assoc();

// # Use this code for debugging :)
// echo '<pre>';
// print_r($user);
// echo '</pre>';

// # Use this code for debugging :)
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
