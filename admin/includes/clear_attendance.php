<?php

include("session.php");

function deleteAllMyRecordAttendance($conn)
{
    $sql = "DELETE attendance
        FROM attendance
        INNER JOIN employees ON attendance.EMP_NAME = CONCAT(employees.FNAME, ' ', employees.MI, ' ', employees.LNAME)
        WHERE employees.ID ='".$_GET["q"]."'";
    $query = $conn->query($sql);

    if ($query) {
        if ($conn->affected_rows > 0) {
            $_SESSION["success"] = "Employee attendance record deleted successful.";
            header("Location: ../attendance.php");
            exit();
        } else {
            $_SESSION["error"] = "No attendance record to be deleted.";
            header("Location: ../attendance.php");
            exit();
        }   
    }
}

if (isset($_GET["q"])) {
    deleteAllMyRecordAttendance($conn);
}

$conn->close();