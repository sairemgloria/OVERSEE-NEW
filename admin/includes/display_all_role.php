<?php

$sql = "SELECT * FROM roles ORDER BY ROLE_NAME ASC";
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
            <td style="text-align: center; vertical-align: middle;"><?= $row["ROLE_NAME"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["DEPT_DESIGNATED"]; ?></td>
            <td style="text-align: center; vertical-align: middle;">
                <div class="btn-group btn-group-sm p-2">
                    <a href="view_role_profile.php?q=<?= $row['ID']; ?>" class="btn btn-success"><i class="material-icons" id="material-icon">visibility</i></a>
                    <a href="edit_role_profile.php?q=<?= $row['ID']; ?>" class="btn btn-primary"><i class="material-icons" id="material-icon">edit</i></a>
                    <a href="./includes/delete_role_profile.php?q=<?= $row['ID']; ?>" onclick="confirmDeleteRole(event, <?= $row['ID']; ?>);" class="btn btn-danger"><i class="material-icons" id="material-icon">delete</i></a>
                </div>
            </td>
        </tr>
        <?php
    }
}
?>