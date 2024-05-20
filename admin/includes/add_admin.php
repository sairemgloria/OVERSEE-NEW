<?php

include("session.php");

function checkEmptyFieldsAndRedirectAddAdmin ($USERNAME, $PASSWORD, $NAME, $ROLE) {
    if (empty($USERNAME) && empty($PASSWORD) && empty($NAME) && empty($ROLE)) {
        $_SESSION["error"] = "Fields are empty. Please fill up the form.";
    } elseif (empty($USERNAME)) {
        $_SESSION["error"] = "Username is empty. Please fill up the field.";
    } elseif (empty($PASSWORD)) {
        $_SESSION["error"] = "Password is empty. Please fill up the field.";
    } elseif (empty($NAME)) {
        $_SESSION["error"] = "Name is empty. Please fill up the field.";
    } elseif (empty($ROLE)) {
        $_SESSION["error"] = "Role is empty. Please fill up the field.";
    }

    if (isset($_SESSION["error"])) {
        header("Location: ../admin.php");
        exit();
    }
}

function submitFormAndRedirectAddAdmin ($USERNAME, $PASSWORD, $NAME, $ROLE, $conn) {

    $uploadImageDestination = "../assets/uploads/"; // THIS IS THE DIRECTORY USED FOR THE IMAGE THAT WILL UPLOAD TO THE APPLICATION

    $display_tmp_name = $_FILES["PROFILE"]["tmp_name"];
    $display_filename = $_FILES["PROFILE"]["name"];
    move_uploaded_file($display_tmp_name, "$uploadImageDestination/$display_filename");

    $sql = "INSERT INTO admins (`USERNAME`, `PASSWORD`, `NAME`, `ROLE`, `PROFILE`) VALUES ('$USERNAME', '$PASSWORD', '$NAME', '$ROLE', '$display_filename')";

    if ($conn->query($sql)) {
        $_SESSION["success"] = "Admin registered successfully.";
        header("Location: ../admin.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}

if (isset($_POST["SUBMIT"])) {
    $USERNAME = $_POST["USERNAME"];
    $PASSWORD = $_POST["PASSWORD"];
    $NAME = $_POST["NAME"];
    $ROLE = $_POST["ROLE"];

    checkEmptyFieldsAndRedirectAddAdmin($USERNAME, $PASSWORD, $NAME, $ROLE);
    submitFormAndRedirectAddAdmin($USERNAME, $PASSWORD, $NAME, $ROLE, $conn);
}