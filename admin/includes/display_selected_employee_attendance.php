<?php

$sql = "SELECT employees.*, attendance.EMP_NAME, attendance.AMLOGIN, attendance.AMLOGIN_STATUS, attendance.PMLOGOUT, attendance.PMLOGOUT_STATUS, CURRENTDATE, STATUS FROM employees INNER JOIN attendance ON attendance.EMP_NAME = CONCAT(employees.FNAME, ' ', employees.MI, ' ', employees.LNAME) WHERE employees.ID = '" . $_GET["q"] . "'";

$query = $conn->query($sql);

if ($query) {
    $count = 1;

    // Fetch each row from the query result
    while ($row = $query->fetch_assoc()) {
?>
        <tr>
            <td style="text-align: center; vertical-align: middle;"><?= $count++; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["FNAME"] . " " . $row["MI"] . " " . $row["LNAME"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["AMLOGIN"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["AMLOGIN_STATUS"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["PMLOGOUT"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["PMLOGOUT_STATUS"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["CURRENTDATE"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["STATUS"]; ?></td>
        </tr>
<?php
    }
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>