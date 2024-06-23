<?php

    session_start();
    include("conn.php");

    if (!isset($_SESSION['user']) OR empty($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }

    $user_ID = $_SESSION['user'];
    $sql = "SELECT * FROM employees WHERE ID='$user_ID'";
    $query = $conn->query($sql);

    if (!$query) {
        die("Error: ". $conn->error);
    }

    $userAcc = $query->fetch_assoc();