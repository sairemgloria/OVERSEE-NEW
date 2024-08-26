<?php

$sql = "SELECT * FROM employees WHERE GENDER = 'FEMALE' ORDER BY LNAME ASC";
$query = $conn->query($sql);

if (!$query) {
   echo "Error: " . $conn->error; // Handle database query error
} else {
   $count = 1;

   // Fetch each row from the query result
   while ($row = $query->fetch_assoc()) {
?>
      <?php if ($user['ROLE'] == $row['DEPARTMENT']) { ?>
         <tr>
            <td style="text-align: center; vertical-align: middle;"><?= $count++; ?></td>
            <td style="text-align: center; vertical-align: middle;">
               <img src="./assets/images/<?= empty($row["PROFILE"]) ? "default.jpg" : "../uploads/" . $row["PROFILE"]; ?>" width="50" height="50" alt="...">
            </td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["LNAME"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["FNAME"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["MI"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["GENDER"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["ROLE"]; ?></td>
            <td style="text-align: center; vertical-align: middle;">
               <div class="btn-group btn-group-sm p-2">
                  <a href="view_employee_profile.php?q=<?= $row['ID']; ?>" class="btn btn-success"><i class="material-icons" id="material-icon">visibility</i></a>
                  <a href="edit_employee_profile.php?q=<?= $row['ID']; ?>" class="btn btn-primary"><i class="material-icons" id="material-icon">edit</i></a>
                  <a href="#" onclick="confirmDeleteEmployee(event, <?= $row['ID']; ?>);" class="btn btn-danger"><i class="material-icons" id="material-icon">delete</i></a>
               </div>
            </td>
         </tr>
      <?php } else if ($user['ROLE'] == "SysAdmin") { ?>
         <tr>
            <td style="text-align: center; vertical-align: middle;"><?= $count++; ?></td>
            <td style="text-align: center; vertical-align: middle;">
               <img src="./assets/images/<?= empty($row["PROFILE"]) ? "default.jpg" : "../uploads/" . $row["PROFILE"]; ?>" width="50" height="50" alt="...">
            </td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["LNAME"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["FNAME"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["MI"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["GENDER"]; ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $row["ROLE"]; ?></td>
            <td style="text-align: center; vertical-align: middle;">
               <div class="btn-group btn-group-sm p-2">
                  <a href="view_employee_profile.php?q=<?= $row['ID']; ?>" class="btn btn-success"><i class="material-icons" id="material-icon">visibility</i></a>
                  <a href="edit_employee_profile.php?q=<?= $row['ID']; ?>" class="btn btn-primary"><i class="material-icons" id="material-icon">edit</i></a>
                  <a href="#" onclick="confirmDeleteEmployee(event, <?= $row['ID']; ?>);" class="btn btn-danger"><i class="material-icons" id="material-icon">delete</i></a>
               </div>
            </td>
         </tr>
      <?php } ?>
<?php
   }
}
?>