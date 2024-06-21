<?php

include("session.php");

function checkEmptyFieldsAndRedirectEditRole($ID, $ROLE_NAME, $DEPT_DESIGNATED)
{
    if (empty($ROLE_NAME) && empty($DEPT_DESIGNATED)) {
        $_SESSION["error"] = "Fields are empty. Kindly fill the form.";
    } elseif (empty($ROLE_NAME)) {
        $_SESSION["error"] = "Role name is empty. Kindly fill the empty field.";
    } elseif (empty($DEPT_DESIGNATED)) {
        $_SESSION["error"] = "Department designated is empty. Kindly fill the empty field.";
    }

    // THIS WILL REDIRECT TO edit_admin_profile ID
    if (isset($_SESSION["error"])) {
        header("Location: ../edit_role_profile.php?q=$ID");
        exit();
    }
}

function updateFormAndRedirectEditRole($ID, $ROLE_NAME, $DEPT_DESIGNATED, $conn)
{
    // UPDATE SQL QUERY
    $sql = "UPDATE roles SET ROLE_NAME='$ROLE_NAME', DEPT_DESIGNATED='$DEPT_DESIGNATED' WHERE ID='$ID'";

    if ($conn->query($sql)) {
        $_SESSION["success"] = "Role updated successful.";
        header("Location: ../edit_role_profile.php?q=$ID");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}

if (isset($_POST["UPDATE"])) {
    $ID = $_POST["ID"];
    $ROLE_NAME = $_POST["ROLE_NAME"];
    $DEPT_DESIGNATED = $_POST["DEPT_DESIGNATED"];

    checkEmptyFieldsAndRedirectEditRole($ID, $ROLE_NAME, $DEPT_DESIGNATED,);
    updateFormAndRedirectEditRole($ID, $ROLE_NAME, $DEPT_DESIGNATED, $conn);
}
