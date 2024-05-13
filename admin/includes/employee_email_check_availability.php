<?php

require("session.php");

if (!empty($_POST["email"])) {
    $email = $_POST["email"];
    $sql = "SELECT EMAIL FROM employees WHERE EMAIL='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<span class='text-danger'> Email already exists .</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {
        echo "<span class='text-success'> Email available for Registration .</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}
