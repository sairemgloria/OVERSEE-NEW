<?php

define('db_host', 'localhost');             // SETTING UP NAME FOR HOST
define('db_user', 'root');                  // SETTING UP NAME FOR USER
define('db_pw', '');                        // SETTING UP PASSWORD OF SERVER
// define('db_name', 'dbase_oversee'); // ORIGINAL DATABASE
define('db_name', 'dbase_test_oversee');    // SETTING UP THE DATABASE NAME

// CREATING DATABASE CONNECTION
$conn = new mysqli(db_host, db_user, db_pw, db_name);

if ($conn->connect_error) {
    die('Error : ' . $conn->connect_error);
} else {
    $database = [
        'Hostname' => db_host,
        'Username' => db_user,
        'Password' => db_pw,
        'Database Name' => db_name,
    ];
    // UNCOMMENT THIS TWO LINES OF CODE IF YOU ARE DONE CHECKING THE CONNECTION
    // print_r($database); // CHECK THE $database ARRAY AND PRINT
    // echo '<br>Connected successfully!'; // SHOW SUCCESSFUL CONNECTED MESSAGE
}