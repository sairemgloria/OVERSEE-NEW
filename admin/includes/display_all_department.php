<?php

$sql = "SELECT * FROM departments ORDER BY DEPARTMENT_NAME ASC";
$query = $conn->query($sql);

if (!$query) {
    echo "Error: " . $conn->error; // Handle database query error
} else {
    $count = 1;

    // Fetch each row from the query result
    while ($row = $query->fetch_assoc()) {
        ?>
        <tr>
            <td style="text-align: center; vertical-align: middle;"><?= $count++; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["DEPARTMENT_NAME"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["DEPARTMENT_TIME_IN"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["DEPARTMENT_TIME_OUT"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["DEPARTMENT_OVERTIME"]; ?></td>
            <td style="text-align: center; vertical-align: middle;">
                <div class="btn-group btn-group-sm p-2">
                    <a href="view_department_profile.php?q=<?= $row['ID']; ?>" class="btn btn-success"><i class="material-icons" id="material-icon">visibility</i></a>
                    <a href="edit_department_profile.php?q=<?= $row['ID']; ?>" class="btn btn-primary"><i class="material-icons" id="material-icon">edit</i></a>
                    <a href="./includes/delete_department_profile.php?q=<?= $row['ID']; ?>" onclick="confirmDeleteDepartment(event, <?= $row['ID']; ?>);" class="btn btn-danger"><i class="material-icons" id="material-icon">delete</i></a>
                </div>
            </td>
        </tr>
        <?php
    }
}
?>