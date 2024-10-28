<?php

session_start();
include("conn.php");

function checkEmptyFieldsAndRedirectQRLogin($USERNAME, $PASSWORD) {
    if (empty($USERNAME) && empty($PASSWORD)) {
        $_SESSION["error"] = "Username and password are empty";
    } elseif (empty($USERNAME)) {
        $_SESSION["error"] = "Username is empty";
    } elseif (empty($PASSWORD)) {
        $_SESSION["error"] = "Password is empty";
    }

    if (isset($_SESSION["error"])) {
        header("Location: ../qrlogin.php");
        exit();
    }
}

function checkCredentialsAndRedirectQRLogin($USERNAME, $PASSWORD, $conn) {
   // Hash the entered password
   // $hashedPassword = md5($PASSWORD);

   $sql = "SELECT * FROM qr WHERE USERNAME='$USERNAME' AND PASSWORD='$PASSWORD'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        $qr_row = $query->fetch_assoc();
        $_SESSION['qr'] = $qr_row['ID'];
        header("Location: ../dashboard.php");
        exit();
    }

    $_SESSION["error"] = "Username or password is incorrect";
    header("Location: ../qrlogin.php");
    exit();
}

if (isset($_POST['login'])) {
    $USERNAME = $_POST['USERNAME'];
    $PASSWORD = $_POST['PASSWORD'];

    checkEmptyFieldsAndRedirectQRLogin($USERNAME, $PASSWORD);
    checkCredentialsAndRedirectQRLogin($USERNAME, $PASSWORD, $conn);
}