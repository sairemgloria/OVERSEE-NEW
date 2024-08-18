<?php

include("session.php");

function checkEmptyFieldsForEmployeeUpdateDisplayProfile($ID, $PROFILE) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    
    if (empty($PROFILE['name'])) {
        $_SESSION["error"] = "Display profile is empty. Please upload a valid file format.";
    } elseif (!in_array($PROFILE['type'], $allowedTypes)) {
        $_SESSION["error"] = "Invalid file type. Please upload an image file (JPEG, PNG, GIF).";
    }

    if (isset($_SESSION["error"])) {
        header("Location: ../view_employee_profile.php?q=$ID");
        exit();
    }
}

function updateEmployeeDisplayProfile($ID, $conn) {
    $uploadImageDestination = "../assets/uploads/";
    $maxFileSize = 5 * 1024 * 1024; // 5MB IN BYTES

    if (isset($_POST["UPDATE"])) {
        if ($_FILES["PROFILE"]["size"] <= $maxFileSize) {
            $display_tmp_name = $_FILES["PROFILE"]["tmp_name"];
            $display_filename = basename($_FILES["PROFILE"]["name"]);
            $target_file = $uploadImageDestination . $display_filename;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($display_tmp_name, $target_file)) {
                $updateDisplay = "PROFILE='$display_filename'";

                $sql = "UPDATE employees SET $updateDisplay WHERE ID='$ID'";

                if ($conn->query($sql) === TRUE) {
                    $_SESSION["success"] = "Employee display profile updated successful.";
                    header("Location: ../view_employee_profile.php?q=$ID");
                    exit();
                } else {
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "Failed to move uploaded file.";
            }
        } else {
            $_SESSION["error"] = "File size exceeds the maximum limit of 5MB.";
            header("Location: ../view_employee_profile.php?q=$ID");
            exit();
        }
    }
    $conn->close();
}

if (isset($_POST["UPDATE"])) {
    $ID = $_POST["ID"];
    $PROFILE = $_FILES["PROFILE"];
    checkEmptyFieldsForEmployeeUpdateDisplayProfile($ID, $PROFILE);

    // Call the function to update the display profile
    updateEmployeeDisplayProfile($ID, $conn);
}