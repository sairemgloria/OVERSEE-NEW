<?php

include("session.php");

function checkEmptyFieldsAndRedirectAddDepartment($DEPARTMENT_NAME, $DEPARTMENT_TIME_IN, $DEPARTMENT_TIME_OUT, $DEPARTMENT_OVERTIME)
{
    if (empty($DEPARTMENT_NAME) && empty($DEPARTMENT_TIME_IN) && empty($DEPARTMENT_TIME_OUT) && empty($DEPARTMENT_OVERTIME)) {
        $_SESSION["error"] = "Fields are empty. Kindly fill the form.";
    } elseif (empty($DEPARTMENT_NAME)) {
        $_SESSION["error"] = "Department name is empty. Kindly fill the empty field.";
    } elseif (empty($DEPARTMENT_TIME_IN)) {
        $_SESSION["error"] = "Department time in is empty. Kindly select the designated time.";
    } elseif (empty($DEPARTMENT_TIME_OUT)) {
        $_SESSION["error"] = "Department time out is empty. Kindly select the designated time.";
    } elseif (empty($DEPARTMENT_OVERTIME)) {
        $_SESSION["error"] = "Department overtime is empty. Kindly select the designated time.";
    }

    if (isset($_SESSION["error"])) {
        header("Location: ../department.php");
        exit();
    }
}

function submitFormAndRedirectAddDepartment($DEPARTMENT_NAME, $DEPARTMENT_TIME_IN, $DEPARTMENT_TIME_OUT, $DEPARTMENT_OVERTIME, $conn)
{
    $sql = "INSERT INTO departments (`DEPARTMENT_NAME`, `DEPARTMENT_TIME_IN`, `DEPARTMENT_TIME_OUT`, `DEPARTMENT_OVERTIME`) VALUES ('$DEPARTMENT_NAME', '$DEPARTMENT_TIME_IN', '$DEPARTMENT_TIME_OUT', '$DEPARTMENT_OVERTIME')";

    if ($conn->query($sql)) {
        $_SESSION["success"] = "Department registered successful.";
        header("Location: ../department.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}

if (isset($_POST["SUBMIT"])) {
    $DEPARTMENT_NAME = $_POST["DEPARTMENT_NAME"];
    $DEPARTMENT_TIME_IN = $_POST["DEPARTMENT_TIME_IN"];
    $DEPARTMENT_TIME_OUT = $_POST["DEPARTMENT_TIME_OUT"];
    $DEPARTMENT_OVERTIME = $_POST["DEPARTMENT_OVERTIME"];

    checkEmptyFieldsAndRedirectAddDepartment($DEPARTMENT_NAME, $DEPARTMENT_TIME_IN, $DEPARTMENT_TIME_OUT, $DEPARTMENT_OVERTIME);
    submitFormAndRedirectAddDepartment($DEPARTMENT_NAME, $DEPARTMENT_TIME_IN, $DEPARTMENT_TIME_OUT, $DEPARTMENT_OVERTIME, $conn);
}
