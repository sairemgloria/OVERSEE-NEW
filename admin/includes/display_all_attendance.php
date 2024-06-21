<?php

// TEST QUERY
$sql = "SELECT employees.ID, employees.FNAME, employees.MI, employees.LNAME, employees.DEPARTMENT, employees.ROLE, employees.PROFILE FROM employees ORDER BY employees.FNAME ASC";
$query = $conn->query($sql);

if ($query) {
    $count = 1;

    // Fetch each row from the query result
    while ($row = $query->fetch_assoc()) {
?>
        <tr>
            <td style="text-align: center; vertical-align: middle;"><?= $count++; ?></td>
            <td style="text-align: center; vertical-align: middle;">
                <img src="./assets/images/<?= empty($row["PROFILE"]) ? "default.jpg" : "../uploads/" . $row["PROFILE"]; ?>" width="50" height="50" alt="...">
            </td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["FNAME"] . " " . $row["MI"] . " " . $row["LNAME"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["DEPARTMENT"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["ROLE"]; ?></td>
            <td style="text-align: center; vertical-align: middle;">
                <div class="btn-group btn-group-sm p-2">
                    <a href="view_attendance.php?q=<?= $row['ID']; ?>" class="btn btn-success"><i class="material-icons" id="material-icon">visibility</i></a>
                    <!-- <a href="./includes/#?q=<?= $row['ID']; ?>" onclick="confirmDeleteAdmin(event, <?= $row['ID']; ?>);" class="btn btn-danger"><i class="material-icons" id="material-icon">delete</i></a> -->
                </div>
            </td>
        </tr>
<?php
    }
} else {
    echo "Error: " . $conn->error; // Handle database query error
}

$conn->close();
?>