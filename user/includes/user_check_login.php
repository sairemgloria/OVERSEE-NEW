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
    $sql = "SELECT * FROM employees WHERE EMAIL='$EMAIL' AND PASSWORD='$PASSWORD'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        $user_row = $query->fetch_assoc();
        if ($EMAIL === $user_row['EMAIL'] && $PASSWORD === $user_row['PASSWORD']) {
            $_SESSION['user'] = $user_row['ID'];
            header("Location: ../user_dashboard.php");
            exit();
        }
    }

    $_SESSION["error"] = "Email or password is incorrect";
    header("Location: ../login.php");
    exit();
}

if (isset($_POST['login'])) {
    $EMAIL = $_POST['EMAIL'];
    $PASSWORD = md5($_POST['PASSWORD']);

    checkEmptyFieldsAndRedirectUserLogin($EMAIL, $PASSWORD);
    checkCredentialsAndRedirectUserLogin($EMAIL, $PASSWORD, $conn);
}