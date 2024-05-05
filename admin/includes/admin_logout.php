<?php

session_start();
session_unset(); // UNSET ALL SESSION VARIABLES
session_destroy(); // DESTROY THE SESSION
header("Location: ../admin_login.php"); // REDIRECT TO ADMIN LOGIN PAGE
exit();
