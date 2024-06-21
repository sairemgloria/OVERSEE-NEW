<?php

include("session.php");

function overtimeSwitch($ID, $conn)
{
    // Set the value based on the checkbox state
    $OT = ($_POST['SWITCH'] === 'on') ? 'Activated' : 'Deactivated';

    // SQL Query
    $sql = "UPDATE employees SET OT='$OT' WHERE ID='$ID'";

    if ($conn->query($sql)) {
        $_SESSION["success"] = "Employee overtime updated successful.";
        header("Location: ../view_employee_profile.php?q=$ID");
        exit();
    } else {
        $_SESSION["error"] = "Error: " . $conn->error;
    }
    
}

if (isset($_POST["SWITCH"]) && isset($_POST["ID"])) {
    $ID = $_POST["ID"];
    overtimeSwitch($ID, $conn);
}