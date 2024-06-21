<?php

include("session.php");

function checkEmptyFieldsAndRedirectAddAdmin($USERNAME, $PASSWORD, $NAME, $ROLE)
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
        header("Location: ../admin.php");
        exit();
    }
}

function submitFormAndRedirectAddAdmin($USERNAME, $PASSWORD, $NAME, $ROLE, $conn)
{

    $uploadImageDestination = "../assets/uploads/"; // THIS IS THE DIRECTORY USED FOR THE IMAGE THAT WILL UPLOAD TO THE APPLICATION
    $maxFileSize = 5 * 1024 * 1024; // 5MB IN BYTES

    $display_tmp_name = $_FILES["PROFILE"]["tmp_name"];
    $display_filename = $_FILES["PROFILE"]["name"];
    $file_size = $_FILES["PROFILE"]["size"];
    $file_extension = strtolower(pathinfo($display_filename, PATHINFO_EXTENSION));
    $allowed_extensions = array('jpg', 'jpeg', 'png'); // ONLY ALLOWED FILE TYPES CAN BE UPLOADED

    if (empty($display_filename)) {
        move_uploaded_file($display_tmp_name, "$uploadImageDestination/$display_filename");

        $sql = "INSERT INTO admins (`USERNAME`, `PASSWORD`, `NAME`, `ROLE`, `PROFILE`) VALUES ('$USERNAME', '$PASSWORD', '$NAME', '$ROLE', '$display_filename')";

        if ($conn->query($sql)) {
            $_SESSION["success"] = "Admin registered successful.";
            header("Location: ../admin.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        // THIS CONDITION WILL ALLOW ONLY UPLOAD THE FILE TYPE .JPG, .JPEG, .PNG ONLY
        if (!in_array($file_extension, $allowed_extensions)) {
            $_SESSION["error"] = "Invalid file format. Only .jpg, .jpeg, and .png files are allowed.";
            header("Location: ../admin.php");
            exit();
        }

        // THIS CONDITION ONLY ALLOW FILE UPLOAD OF LESS THAN EQUAL TO 5 MEGABYTES (.JPG, .JPEG, .PNG ONLY)
        if ($file_size >= $maxFileSize) {
            $_SESSION["error"] = "File size exceeds the maximum limit of 5MB.";
            header("Location: ../admin.php");
            exit();
        } else {
            move_uploaded_file($display_tmp_name, "$uploadImageDestination/$display_filename");

            $sql = "INSERT INTO admins (`USERNAME`, `PASSWORD`, `NAME`, `ROLE`, `PROFILE`) VALUES ('$USERNAME', '$PASSWORD', '$NAME', '$ROLE', '$display_filename')";

            if ($conn->query($sql)) {
                $_SESSION["success"] = "Admin registered successfully.";
                header("Location: ../admin.php");
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
        }
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
