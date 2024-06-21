<?php

include("session.php");

function deleteEmployeeProfile($conn) {
    $sql = "DELETE FROM employees WHERE ID='".$_GET["q"]."'";
    $query = $conn->query($sql);

    if ($query) {
        if ($conn->affected_rows > 0) {
            $_SESSION["success"] = "Employee profile deleted successful.";
            header("Location: ../employee.php");
            exit();
        }
        return "Error: " . $conn->error;
    }
    return "Error: ". $conn->error;
}

if (isset($_GET["q"])) {
    deleteEmployeeProfile($conn);
}