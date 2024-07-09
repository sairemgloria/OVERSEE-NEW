<?php

include('conn.php');

// Debugging: Check if the connection is established
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['export'])) {
    $output = "";
    $output .= '
        <table border="1">
        <tr>
            <th>#</th>
            <th>EMPLOYEE NAME</th>
            <th>TIME IN</th>
            <th>IN STATUS</th>
            <th>TIME OUT</th>
            <th>OUT STATUS</th>
            <th>LOGDATE</th>
            <th>STATUS</th>
        </tr>
    ';

    $exportId = $conn->real_escape_string($_GET['export']);
    $sql = "SELECT DISTINCT employees.FNAME, employees.LNAME, attendance.EMP_NAME, attendance.AMLOGIN, attendance.AMLOGIN_STATUS, attendance.PMLOGOUT, attendance.PMLOGOUT_STATUS, CURRENTDATE, STATUS,
        CONCAT(employees.FNAME, ' ', employees.LNAME) AS FULL_NAME
        FROM employees
        INNER JOIN attendance ON attendance.EMP_NAME = CONCAT(employees.FNAME, ' ', employees.MI, ' ', employees.LNAME)
        WHERE employees.ID = '$exportId'";

    $result = $conn->query($sql);

    $fullNames = array();

    if ($result->num_rows > 0) {
        $counter = 1; // Initialize the counter outside the loop
        while ($row = $result->fetch_assoc()) {
            $fullName = $row['FNAME'] . ' ' . $row['LNAME'];

            // Check if the fullName is not already in the list before adding it
            if (!in_array($fullName, $fullNames)) {
                $fullNames[] = $fullName;
            }

            $output .= '
                <tr>
                    <td>' . $counter . '</td> <!-- Use the counter here -->
                    <td>' . $fullName . '</td>
                    <td>' . $row['AMLOGIN'] . '</td>
                    <td>' . $row['AMLOGIN_STATUS'] . '</td>
                    <td>' . $row['PMLOGOUT'] . '</td>
                    <td>' . $row['PMLOGOUT_STATUS'] . '</td>
                    <td>' . $row['CURRENTDATE'] . '</td>
                    <td>' . $row['STATUS'] . '</td>
                </tr>
            ';
            $counter++; // Increment the counter after each row
        }
    }

    $output .= '</table>';
    $filename = implode('_', $fullNames) . "_attendance_record-" . date('Y-m-d') . ".xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");

    echo $output;
    exit;
}