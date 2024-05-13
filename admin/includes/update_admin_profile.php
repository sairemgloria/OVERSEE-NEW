<?php

include("session.php");

function checkEmptyFieldsAndRedirectEditAdmin($ID, $USERNAME, $PASSWORD, $NAME, $ROLE) {
    if (empty($USERNAME) && empty($PASSWORD) && empty($NAME) && empty($ROLE)) {
        $_SESSION["error"] = "Fields are require to fill up";
    } elseif (empty($USERNAME)) {
        $_SESSION["error"] = "Username is empty";
    } elseif (empty($PASSWORD)) {
        $_SESSION["error"] = "Password is empty";
    } elseif (empty($NAME)) {
        $_SESSION["error"] = "Name is empty";
    } elseif (empty($ROLE)) {
        $_SESSION["error"] = "Role is empty";
    }

    if (isset($_SESSION["error"])) {
        header("Location: ../edit_admin_profile.php?q=$ID");
        exit();
    }
}

function updateFormAndRedirectEditAdmin($ID, $USERNAME, $PASSWORD, $NAME, $ROLE, $conn) {

    $uploadImageDestination = "../assets/uploads/"; // THIS IS THE DIRECTORY USED FOR THE IMAGE THAT WILL UPLOAD TO THE APPLICATION

    if (isset($_POST["UPDATE"])) {
        $ID = $_POST["ID"];
        $USERNAME = $_POST["USERNAME"];
        $PASSWORD = $_POST["PASSWORD"];
        $NAME = $_POST["NAME"];
        $ROLE = $_POST["ROLE"];

        if ($_FILES["PROFILE"]['size'] > 0) {
            $display_tmp_name = $_FILES["PROFILE"]["tmp_name"];
            $display_filename = $_FILES["PROFILE"]["name"];
            move_uploaded_file($display_tmp_name, "$uploadImageDestination/$display_filename");
            $updateProfileDisplay = ", PROFILE='$display_filename'";
        } else {
            $updateProfileDisplay = "";
        }

        $sql = "UPDATE admins SET USERNAME='$USERNAME', PASSWORD='$PASSWORD', NAME='$NAME', ROLE='$ROLE' $updateProfileDisplay WHERE ID='$ID'";

        if ($conn->query($sql)) {
            $_SESSION["success"] = "Admin profile updated successfully";
            header("Location: ../edit_admin_profile.php?q=$ID");
            exit();
        } else {
            echo "Error :" . $conn->error;
        }

        $conn-> close();

    }

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