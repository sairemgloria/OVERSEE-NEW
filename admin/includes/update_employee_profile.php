<?php

include("session.php");

function checkEmptyFieldsAndRedirectEditEmployee($ID, $FNAME, $MI, $LNAME, $EMAIL, $CONTACT, $DATE_OF_BIRTH, $CIVIL_STATUS, $NATIONALITY, $ROLE, $DEPARTMENT, $GENDER) {
    if (empty($FNAME) && empty($MI) && empty($LNAME) && empty($EMAIL) && empty($CONTACT) && empty($DATE_OF_BIRTH) && empty($CIVIL_STATUS) && empty($NATIONALITY) && empty($ROLE) && empty($DEPARTMENT) && empty($GENDER)) {
        $_SESSION["error"] = "Fields are require to fill up";
    } elseif (empty($FNAME)) {
        $_SESSION["error"] = "First name is empty";
    } elseif (empty($MI)) {
        $_SESSION["error"] = "Middle name is empty";
    } elseif (empty($LNAME)) {
        $_SESSION["error"] = "Last name is empty";
    } elseif (empty($EMAIL)) {
        $_SESSION["error"] = "Email is empty";
    } elseif (empty($DEPARTMENT)) {
        $_SESSION["error"] = "Department is empty";
    } elseif (empty($ROLE)) {
        $_SESSION["error"] = "Role is empty";
    } elseif (empty($CONTACT)) {
        $_SESSION["error"] = "Contact is empty";
    } elseif (empty($DATE_OF_BIRTH)) {
        $_SESSION["error"] = "Date of birth is empty";
    } elseif (empty($GENDER)) {
        $_SESSION["error"] = "Gender is empty";
    } elseif (empty($CIVIL_STATUS)) {
        $_SESSION["error"] = "Civil status is empty";
    } elseif (empty($NATIONALITY)) {
        $_SESSION["error"] = "Nationality is empty";
    }

    if (isset($_SESSION["error"])) {
        header("Location: ../edit_employee_profile.php?q=$ID");
        exit();
    }
}

function updateFormAndRedirectEditEmployee($ID, $FNAME, $MI, $LNAME, $EMAIL, $CONTACT, $PASSWORD, $DATE_OF_BIRTH, $CIVIL_STATUS, $NATIONALITY, $ROLE, $DEPARTMENT, $GENDER, $conn) {

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
            header("Location: ../edit_employee_profile.php?q=$ID");
            exit();
        }

        // CHECKING THE FILE SIZE
        if ($_FILES["PROFILE"]["size"] > $maxFileSize) {
            $_SESSION["error"] = "File size exceeds the maximum limit of 5MB.";
            header("Location: ../edit_employee_profile.php?q=$ID");
            exit();
        }

        // MOVE UPLOADED FILE
        if (move_uploaded_file($display_tmp_name, "$uploadImageDestination/$display_filename")) {
            $updateProfileDisplay = ", PROFILE='$display_filename'";
        } else {
            $_SESSION["error"] = "Error in uploading the file.";
            header("Location: ../edit_employee_profile.php?q=$ID");
            exit();
        }
    }

    // UPDATE SQL QUERY
    if (empty($PASSWORD)) {
        $sql = "UPDATE employees SET FNAME='$FNAME', MI='$MI', LNAME='$LNAME', EMAIL='$EMAIL', CONTACT='$CONTACT', DATE_OF_BIRTH='$DATE_OF_BIRTH', CIVIL_STATUS='$CIVIL_STATUS', NATIONALITY='$NATIONALITY', ROLE='$ROLE', DEPARTMENT='$DEPARTMENT', GENDER='$GENDER' $updateProfileDisplay WHERE ID='$ID'";
    } else {
        $PASSWORD = md5($PASSWORD . '@OS' . date("Y"));
        $sql = "UPDATE employees SET FNAME='$FNAME', MI='$MI', LNAME='$LNAME', EMAIL='$EMAIL', PASSWORD='$PASSWORD', CONTACT='$CONTACT', DATE_OF_BIRTH='$DATE_OF_BIRTH', CIVIL_STATUS='$CIVIL_STATUS', NATIONALITY='$NATIONALITY', ROLE='$ROLE', DEPARTMENT='$DEPARTMENT', GENDER='$GENDER' $updateProfileDisplay WHERE ID='$ID'";
    }

    if ($conn->query($sql)) {
        $_SESSION["success"] = "Employee profile updated successful.";
        header("Location: ../edit_employee_profile.php?q=$ID");
        exit();
    } else {
        echo "Error :" . $conn->error;
    }

    $conn->close();

    // end

    // if (isset($_POST["UPDATE"])) {
    //     $ID = $_POST["ID"];
    //     $FNAME = $_POST["FNAME"];
    //     $MI = $_POST["MI"];
    //     $LNAME = $_POST["LNAME"];
    //     $EMAIL = $_POST["EMAIL"];
    //     $PASSWORD = $_POST["PASSWORD"];
    //     $CONTACT = $_POST["CONTACT"];
    //     $DATE_OF_BIRTH = $_POST["DATE_OF_BIRTH"];
    //     $CIVIL_STATUS = $_POST["CIVIL_STATUS"];
    //     $NATIONALITY = $_POST["NATIONALITY"];
    //     $ROLE = $_POST["ROLE"];
    //     $DEPARTMENT = $_POST["DEPARTMENT"];
    //     $GENDER = $_POST["GENDER"];

    //     if ($_FILES["PROFILE"]['size'] > 0) {
    //         $display_tmp_name = $_FILES["PROFILE"]["tmp_name"];
    //         $display_filename = $_FILES["PROFILE"]["name"];
    //         move_uploaded_file($display_tmp_name, "$uploadImageDestination/$display_filename");
    //         $updateProfileDisplay = ", PROFILE='$display_filename'";
    //     } else {
    //         $updateProfileDisplay = "";
    //     }

    //     // old sql code for employee update info
    //     // $sql = "UPDATE employees SET FNAME='$FNAME', MI='$MI', LNAME='$LNAME', EMAIL='$EMAIL', CONTACT='$CONTACT', DATE_OF_BIRTH='$DATE_OF_BIRTH', CIVIL_STATUS='$CIVIL_STATUS', NATIONALITY='$NATIONALITY', ROLE='$ROLE', DEPARTMENT='$DEPARTMENT', GENDER='$GENDER' $updateProfileDisplay WHERE ID='$ID'";

    //     if (empty($PASSWORD)) {
    //         $sql = "UPDATE employees SET FNAME='$FNAME', MI='$MI', LNAME='$LNAME', EMAIL='$EMAIL', CONTACT='$CONTACT', DATE_OF_BIRTH='$DATE_OF_BIRTH', CIVIL_STATUS='$CIVIL_STATUS', NATIONALITY='$NATIONALITY', ROLE='$ROLE', DEPARTMENT='$DEPARTMENT', GENDER='$GENDER' $updateProfileDisplay WHERE ID='$ID'";
    //     } else {
    //         $PASSWORD = md5($PASSWORD . '@OS' . date("Y"));
    //         $sql = "UPDATE employees SET FNAME='$FNAME', MI='$MI', LNAME='$LNAME', EMAIL='$EMAIL', PASSWORD='$PASSWORD', CONTACT='$CONTACT', DATE_OF_BIRTH='$DATE_OF_BIRTH', CIVIL_STATUS='$CIVIL_STATUS', NATIONALITY='$NATIONALITY', ROLE='$ROLE', DEPARTMENT='$DEPARTMENT', GENDER='$GENDER' $updateProfileDisplay WHERE ID='$ID'";
    //     }

    //     if ($conn->query($sql)) {
    //         $_SESSION["success"] = "Employee profile updated successfully";
    //         header("Location: ../edit_employee_profile.php?q=$ID");
    //         exit();
    //     } else {
    //         echo "Error :" . $conn->error;
    //     }

    //     $conn-> close();

    // }

}

if (isset($_POST["UPDATE"])) {
    $ID = $_POST["ID"];
    $FNAME = $_POST["FNAME"];
    $MI = $_POST["MI"];
    $LNAME = $_POST["LNAME"];
    $EMAIL = $_POST["EMAIL"];
    $PASSWORD = $_POST["PASSWORD"];
    $DEPARTMENT = $_POST["DEPARTMENT"];
    $ROLE = $_POST["ROLE"];
    $CONTACT = $_POST["CONTACT"];
    $DATE_OF_BIRTH = $_POST["DATE_OF_BIRTH"];
    $GENDER = $_POST["GENDER"];
    $CIVIL_STATUS = $_POST["CIVIL_STATUS"];
    $NATIONALITY = $_POST["NATIONALITY"];

    checkEmptyFieldsAndRedirectEditEmployee($ID, $FNAME, $MI, $LNAME, $EMAIL, $CONTACT, $DATE_OF_BIRTH, $CIVIL_STATUS, $NATIONALITY, $ROLE, $DEPARTMENT, $GENDER);
    updateFormAndRedirectEditEmployee($ID, $FNAME, $MI, $LNAME, $EMAIL, $CONTACT, $PASSWORD, $DATE_OF_BIRTH, $CIVIL_STATUS, $NATIONALITY, $ROLE, $DEPARTMENT, $GENDER, $conn);
}