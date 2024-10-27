<?php

session_start();
include("conn.php");

function checkEmptyFieldsAndRedirectUserLogin($EMAIL, $PASSWORD) {
    if (empty($EMAIL) && empty($PASSWORD)) {
        $_SESSION["error"] = "Email and password are empty";
    } elseif (empty($EMAIL)) {
        $_SESSION["error"] = "Email is empty";
    } elseif (empty($PASSWORD)) {
        $_SESSION["error"] = "Password is empty";
    }

    if (isset($_SESSION["error"])) {
        header("Location: ../login.php");
        exit();
    }
}

function checkCredentialsAndRedirectUserLogin($EMAIL, $PASSWORD, $conn) {
   // Hash the entered password
   $hashedPassword = md5($PASSWORD);

   $sql = "SELECT * FROM employees WHERE EMAIL='$EMAIL' AND PASSWORD='$hashedPassword'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        $user_row = $query->fetch_assoc();
        $_SESSION['user'] = $user_row['ID'];
        header("Location: ../user_dashboard.php");
        exit();
    }

    $_SESSION["error"] = "Email or password is incorrect";
    header("Location: ../login.php");
    exit();
}

if (isset($_POST['login'])) {
    $EMAIL = $_POST['EMAIL'];
    $PASSWORD = $_POST['PASSWORD'];

    checkEmptyFieldsAndRedirectUserLogin($EMAIL, $PASSWORD);
    checkCredentialsAndRedirectUserLogin($EMAIL, $PASSWORD, $conn);
}