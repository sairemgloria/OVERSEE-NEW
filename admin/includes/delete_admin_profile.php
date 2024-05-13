<?php

include("session.php");

function deleteAdminProfile($conn) {
    $sql = "DELETE FROM admins WHERE ID='".$_GET["q"]."'";
    $query = $conn->query($sql);

    if ($query) {
        if ($conn->affected_rows > 0) {
            $_SESSION["success"] = "Admin profile deleted successfully";
            header("Location: ../admin.php");
            exit();
        }
        return "Error: " . $conn->error;
    }
    return "Error: ". $conn->error;
}

if (isset($_GET["q"])) {
    deleteAdminProfile($conn);
}