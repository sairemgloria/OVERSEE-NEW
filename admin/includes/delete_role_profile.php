<?php

include("session.php");

function deleteRoleProfile($conn) {
    $sql = "DELETE FROM roles WHERE ID='".$_GET["q"]."'";
    $query = $conn->query($sql);

    if ($query) {
        if ($conn->affected_rows > 0) {
            $_SESSION["success"] = "Role deleted successful.";
            header("Location: ../role.php");
            exit();
        }
        return "Error: " . $conn->error;
    }
    return "Error: ". $conn->error;
}

if (isset($_GET["q"])) {
    deleteRoleProfile($conn);
}