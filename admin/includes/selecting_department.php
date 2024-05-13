<?php
$sql = "SELECT * FROM departments ORDER BY DEPARTMENT_NAME ASC";
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
    echo "<option>" . $row['DEPARTMENT_NAME'] . "</option>";
}