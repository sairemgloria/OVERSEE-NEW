<?php

include("session.php");

function deleteDepartmentProfile($conn) {
    $sql = "DELETE FROM departments WHERE ID='".$_GET["q"]."'";
    $query = $conn->query($sql);

    if ($query) {
        if ($conn->affected_rows > 0) {
            $_SESSION["success"] = "Department deleted successful.";
            header("Location: ../department.php");
            exit();
        }
        return "Error: " . $conn->error;
    }
    return "Error: ". $conn->error;
}

if (isset($_GET["q"])) {
    deleteDepartmentProfile($conn);
}