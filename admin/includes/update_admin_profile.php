<?php

include("session.php");

function checkEmptyFieldsAndRedirectEditAdmin($ID, $USERNAME, $PASSWORD, $NAME, $ROLE)
{
    if (empty($USERNAME) && empty($PASSWORD) && empty($NAME) && empty($ROLE)) {
        $_SESSION["error"] = "Fields are empty. Kindly fill the form.";
    } elseif (empty($USERNAME)) {
        $_SESSION["error"] = "Username is empty. Kindly fill the empty field.";
    } elseif (empty($PASSWORD)) {
        $_SESSION["error"] = "Password is empty. Kindly fill the empty field.";
    } elseif (empty($NAME)) {
        $_SESSION["error"] = "Name is empty. Kindly fill the empty field.";
    } elseif (empty($ROLE)) {
        $_SESSION["error"] = "Role is empty. Kindly choose a selected role.";
    }

    // THIS WILL REDIRECT TO edit_admin_profile ID
    if (isset($_SESSION["error"])) {
        header("Location: ../edit_admin_profile.php?q=$ID");
        exit();
    }
}

function updateFormAndRedirectEditAdmin($ID, $USERNAME, $PASSWORD, $NAME, $ROLE, $conn)
{
    $uploadImageDestination = "../assets/uploads/"; // DIRECTORY FOR IMAGE UPLOAD
    $maxFileSize = 5 * 1024 * 1024; // 5MB IN BYTES

    $display_tmp_name = $_FILES["PROFILE"]["tmp_name"];
    $display_filename = $_FILES["PROFILE"]["name"];
    $file_extension = strtolower(pathinfo($display_filename, PATHINFO_EXTENSION));
    $allowed_extensions = array('jpg', 'jpeg', 'png'); // ALLOWED FILE TYPES

    $updateProfileDisplay = "";

    if (!empty($display_filename)) {
        // CHECKING THE FILE TYPE
        if (!in_array($file_extension, $allowed_extensions)) {
            $_SESSION["error"] = "Invalid file format. Only .jpg, .jpeg, and .png files are allowed.";
            header("Location: ../edit_admin_profile.php?q=$ID");
            exit();
        }

        // CHECKING THE FILE SIZE
        if ($_FILES["PROFILE"]["size"] > $maxFileSize) {
            $_SESSION["error"] = "File size exceeds the maximum limit of 5MB.";
            header("Location: ../edit_admin_profile.php?q=$ID");
            exit();
        }

        // MOVE UPLOADED FILE
        if (move_uploaded_file($display_tmp_name, "$uploadImageDestination/$display_filename")) {
            $updateProfileDisplay = ", PROFILE='$display_filename'";
        } else {
            $_SESSION["error"] = "Error in uploading the file.";
            header("Location: ../edit_admin_profile.php?q=$ID");
            exit();
        }
    }

    // UPDATE SQL QUERY
    $sql = "UPDATE admins SET USERNAME='$USERNAME', PASSWORD='$PASSWORD', NAME='$NAME', ROLE='$ROLE' $updateProfileDisplay WHERE ID='$ID'";

    if ($conn->query($sql)) {
        $_SESSION["success"] = "Admin profile updated successful.";
        header("Location: ../edit_admin_profile.php?q=$ID");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}

if (isset($_POST["UPDATE"])) {
    $ID = $_POST["ID"];
    $USERNAME = $_POST["USERNAME"];
    $PASSWORD = $_POST["PASSWORD"];
    $NAME = $_POST["NAME"];
    $ROLE = $_POST["ROLE"];

    checkEmptyFieldsAndRedirectEditAdmin($ID, $USERNAME, $PASSWORD, $NAME, $ROLE);
    updateFormAndRedirectEditAdmin($ID, $USERNAME, $PASSWORD, $NAME, $ROLE, $conn);
}
