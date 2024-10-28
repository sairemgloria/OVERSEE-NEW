<?php

    $server = "localhost";
    $username = "root";
    $pw = "";
    // $db = "db_oversee"; // original
    $db = "dbase_test_oversee"; // test db

    $conn = new mysqli($server, $username, $pw, $db);

    if ($conn->connect_error) {
        die ("Failed: ". $conn->connect_error);
    }