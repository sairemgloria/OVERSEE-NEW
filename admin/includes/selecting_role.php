<?php
$sql = "SELECT * FROM roles ORDER BY ROLE_NAME ASC";
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
    echo "<option>" . $row['ROLE_NAME'] . "</option>";
}