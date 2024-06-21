<?php

include("session.php");

function checkEmptyFieldsAndRedirectAddRole($ROLE_NAME, $DEPT_DESIGNATED)
{
    if (empty($ROLE_NAME) && empty($DEPT_DESIGNATED)) {
        $_SESSION["error"] = "Fields are empty. Kindly fill the form.";
    } elseif (empty($ROLE_NAME)) {
        $_SESSION["error"] = "Role name is empty. Kindly fill the empty field.";
    } elseif (empty($DEPT_DESIGNATED)) {
        $_SESSION["error"] = "Department designated is empty. Kindly fill the empty field.";
    }

    if (isset($_SESSION["error"])) {
        header("Location: ../role.php");
        exit();
    }
}

function submitFormAndRedirectAddRole($ROLE_NAME, $DEPT_DESIGNATED, $conn)
{
    $sql = "INSERT INTO roles (`ROLE_NAME`, `DEPT_DESIGNATED`) VALUES ('$ROLE_NAME', '$DEPT_DESIGNATED')";

    if ($conn->query($sql)) {
        $_SESSION["success"] = "Role registered successful.";
        header("Location: ../role.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}

if (isset($_POST["SUBMIT"])) {
    $ROLE_NAME = $_POST["ROLE_NAME"];
    $DEPT_DESIGNATED = $_POST["DEPT_DESIGNATED"];

    checkEmptyFieldsAndRedirectAddRole($ROLE_NAME, $DEPT_DESIGNATED);
    submitFormAndRedirectAddRole($ROLE_NAME, $DEPT_DESIGNATED, $conn);
}
