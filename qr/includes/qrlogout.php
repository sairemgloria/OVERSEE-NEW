<?php

session_start();
session_unset(); // UNSET ALL SESSION VARIABLES
session_destroy(); // DESTROY THE SESSION
header("Location: ../qrlogin.php"); // REDIRECT TO USER LOGIN PAGE
exit();
