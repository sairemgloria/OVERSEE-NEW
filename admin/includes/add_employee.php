<?php

include("session.php");

function checkEmptyFieldsForAddEmployee($FNAME, $MI, $LNAME, $EMAIL, $PASSWORD, $CONTACT, $DATE_OF_BIRTH, $GENDER, $CIVIL_STATUS, $NATIONALITY, $DEPARTMENT, $ROLE)
{
    if (empty($FNAME) && empty($MI) && empty($LNAME) && empty($EMAIL) && empty($PASSWORD) && empty($CONTACT) && empty($DATE_OF_BIRTH) && empty($GENDER) && empty($CIVIL_STATUS) && empty($NATIONALITY) && empty($DEPARTMENT) && empty($ROLE)) {
        $_SESSION["error"] = "Fields are require to fill up";
    }

    if (isset($_SESSION["error"])) {
        header("Location: ../employee.php");
        exit();
    }
}

function addEmployee($conn, $FNAME, $MI, $LNAME, $EMAIL, $PASSWORD, $CONTACT, $DATE_OF_BIRTH, $GENDER, $CIVIL_STATUS, $NATIONALITY, $DEPARTMENT, $ROLE, $OT, $TYPE, $EMP_KEY)
{

    $sql = "SELECT * FROM employees WHERE FNAME='$FNAME' AND MI='$MI' AND LNAME='$LNAME'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        $_SESSION["error"] = "Employee already exists";
    } else {
        $sql = "INSERT INTO employees (`FNAME`, `MI`, `LNAME`, `EMAIL`, `PASSWORD`, `CONTACT`, `DATE_OF_BIRTH`, `GENDER`, `CIVIL_STATUS`, `NATIONALITY`, `DEPARTMENT`, `ROLE`, `OT`, `TYPE`, `EMP_KEY`) VALUES ('$FNAME', '$MI', '$LNAME', '$EMAIL', '$PASSWORD', '$CONTACT', '$DATE_OF_BIRTH', '$GENDER', '$CIVIL_STATUS', '$NATIONALITY', '$DEPARTMENT', '$ROLE', '$OT', '$TYPE', '$EMP_KEY')";

        if ($conn->query($sql)) {
            $_SESSION["success"] = "Employee registration successfully";
            header("Location: ../employee.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
        $conn->close();
    }
}

if (isset($_POST["submit"])) {
    $FNAME = $_POST["FNAME"];
    $MI = $_POST["MI"];
    $LNAME = $_POST["LNAME"];
    $EMAIL = $_POST["EMAIL"];
    $PASSWORD = $_POST["PASSWORD"];
    $CONTACT = $_POST["CONTACT"];
    $DATE_OF_BIRTH = $_POST["DATE_OF_BIRTH"];
    $GENDER = $_POST["GENDER"];
    $CIVIL_STATUS = $_POST["CIVIL_STATUS"];
    $NATIONALITY = $_POST["NATIONALITY"];
    $DEPARTMENT = $_POST["DEPARTMENT"];
    $ROLE = $_POST["ROLE"];
    $OT = "Deactivated";
    $TYPE = "User";

    // Generate random code for EMP_KEY
    function generateRandomCode($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $code;
    }

    do {
        $EMP_KEY = 'OS' . date("Y") . '-' . generateRandomCode(8);

        // Check if the EMP_KEY already exists in the client table
        $sql = "SELECT EMP_KEY FROM client WHERE EMP_KEY = '$EMP_KEY'";
        $query = $conn->query($sql);
    } while ($query->num_rows > 0); 

    checkEmptyFieldsForAddEmployee($FNAME, $MI, $LNAME, $EMAIL, $PASSWORD, $CONTACT, $DATE_OF_BIRTH, $GENDER, $CIVIL_STATUS, $NATIONALITY, $DEPARTMENT, $ROLE);
    addEmployee($FNAME, $MI, $LNAME, $EMAIL, md5($PASSWORD), $CONTACT, $DATE_OF_BIRTH, $GENDER, $CIVIL_STATUS, $NATIONALITY, $DEPARTMENT, $ROLE, $OT, $TYPE, $EMP_KEY, $conn);
}
