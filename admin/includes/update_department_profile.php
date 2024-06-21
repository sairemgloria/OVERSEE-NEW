<?php

include("session.php");

function checkEmptyFieldsAndRedirectEditDept($ID, $DEPARTMENT_NAME, $DEPARTMENT_TIME_IN, $DEPARTMENT_TIME_OUT, $DEPARTMENT_OVERTIME)
{
    if (empty($DEPARTMENT_NAME) && empty($DEPARTMENT_TIME_IN) && empty($DEPARTMENT_TIME_OUT) && empty($DEPARTMENT_OVERTIME)) {
        $_SESSION["error"] = "Fields are empty. Kindly fill the form.";
    } elseif (empty($DEPARTMENT_NAME)) {
        $_SESSION["error"] = "Department name is empty. Kindly fill the empty field.";
    } elseif (empty($DEPARTMENT_TIME_IN)) {
        $_SESSION["error"] = "Time in is empty. Kindly set the given time.";
    } elseif (empty($DEPARTMENT_TIME_OUT)) {
        $_SESSION["error"] = "Time out is empty. Kindly set the given time.";
    } elseif (empty($DEPARTMENT_OVERTIME)) {
        $_SESSION["error"] = "Overtime is empty. Kindly set the given time.";
    }

    // THIS WILL REDIRECT TO edit_admin_profile ID
    if (isset($_SESSION["error"])) {
        header("Location: ../edit_department_profile.php?q=$ID");
        exit();
    }
}

function updateFormAndRedirectEditDeptAdmin($ID, $DEPARTMENT_NAME, $DEPARTMENT_TIME_IN, $DEPARTMENT_TIME_OUT, $DEPARTMENT_OVERTIME, $conn)
{
    // UPDATE SQL QUERY
    $sql = "UPDATE departments SET DEPARTMENT_NAME='$DEPARTMENT_NAME', DEPARTMENT_TIME_IN='$DEPARTMENT_TIME_IN', DEPARTMENT_TIME_OUT='$DEPARTMENT_TIME_OUT', DEPARTMENT_OVERTIME='$DEPARTMENT_OVERTIME' WHERE ID='$ID'";

    if ($conn->query($sql)) {
        $_SESSION["success"] = "Department updated successful.";
        header("Location: ../edit_department_profile.php?q=$ID");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}

if (isset($_POST["UPDATE"])) {
    $ID = $_POST["ID"];
    $DEPARTMENT_NAME = $_POST["DEPARTMENT_NAME"];
    $DEPARTMENT_TIME_IN = $_POST["DEPARTMENT_TIME_IN"];
    $DEPARTMENT_TIME_OUT = $_POST["DEPARTMENT_TIME_OUT"];
    $DEPARTMENT_OVERTIME = $_POST["DEPARTMENT_OVERTIME"];

    checkEmptyFieldsAndRedirectEditDept($ID, $DEPARTMENT_NAME, $DEPARTMENT_TIME_IN, $DEPARTMENT_TIME_OUT, $DEPARTMENT_OVERTIME);
    updateFormAndRedirectEditDeptAdmin($ID, $DEPARTMENT_NAME, $DEPARTMENT_TIME_IN, $DEPARTMENT_TIME_OUT, $DEPARTMENT_OVERTIME, $conn);
}
