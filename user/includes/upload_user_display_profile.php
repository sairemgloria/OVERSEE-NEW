<?php

include("session.php");

function checkEmptyFieldsForUsersUpdateDisplayProfile($ID, $PROFILE) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    
    if (empty($PROFILE['name'])) {
        $_SESSION["error"] = "Display profile is empty. Please upload a valid file format.";
    } elseif (!in_array($PROFILE['type'], $allowedTypes)) {
        $_SESSION["error"] = "Invalid file type. Please upload an image file (JPEG, PNG, GIF).";
    }

    if (isset($_SESSION["error"])) {
        header("Location: ../user_dashboard.php");
        exit();
    }
}

function updateUsersDisplayProfile($ID, $conn) {
    $uploadImageDestination = "../assets/uploads/";

    if (isset($_POST["UPDATE"])) {
        if ($_FILES["PROFILE"]["size"] > 0) {
            $display_tmp_name = $_FILES["PROFILE"]["tmp_name"];
            $display_filename = basename($_FILES["PROFILE"]["name"]);
            $target_file = $uploadImageDestination . $display_filename;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($display_tmp_name, $target_file)) {
                $updateDisplay = "PROFILE='$display_filename'";

                $sql = "UPDATE employees SET $updateDisplay WHERE ID='$ID'";

                if ($conn->query($sql) === TRUE) {
                    $_SESSION["success"] = "Employee display profile updated successful.";
                    header("Location: ../user_dashboard.php");
                    exit();
                } else {
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "Failed to move uploaded file.";
            }
        }
    }
    $conn->close();
}

if (isset($_POST["UPDATE"])) {
    $ID = $_POST["ID"];
    $PROFILE = $_FILES["PROFILE"];

    checkEmptyFieldsForUsersUpdateDisplayProfile($ID, $PROFILE);
    // Call the function to update the display profile
    updateUsersDisplayProfile($ID, $conn);
}