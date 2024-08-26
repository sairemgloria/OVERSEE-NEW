<?php

session_start();
include("conn.php");

function checkEmptyFieldsAndRedirect($USERNAME, $PASSWORD) {
    if (empty($USERNAME) && empty($PASSWORD)) {
        $_SESSION["error"] = "Username and password are empty";
    } elseif (empty($USERNAME)) {
        $_SESSION["error"] = "Username is empty";
    } elseif (empty($PASSWORD)) {
        $_SESSION["error"] = "Password is empty";
    }

    if (isset($_SESSION["error"])) {
        header("Location: ../admin_login.php");
        exit();
    }
}

function checkCredentialsAndRedirect($USERNAME, $PASSWORD, $conn) {
    $sql = "SELECT * FROM admins WHERE USERNAME='$USERNAME' AND PASSWORD='$PASSWORD'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        $row = $query->fetch_assoc();
        if ($USERNAME === $row['USERNAME'] && $PASSWORD === $row['PASSWORD']) {
            # We store here the ID for the session use.
            $_SESSION['admin'] = $row['ID'];
            header("Location: ../dashboard.php");
            exit();
        }
    }

    $_SESSION["error"] = "Username or password is incorrect";
    header("Location: ../admin_login.php");
    exit();
}

if (isset($_POST['login'])) {
    $USERNAME = $_POST['USERNAME'];
    $PASSWORD = $_POST['PASSWORD'];

    checkEmptyFieldsAndRedirect($USERNAME, $PASSWORD);
    checkCredentialsAndRedirect($USERNAME, $PASSWORD, $conn);
}