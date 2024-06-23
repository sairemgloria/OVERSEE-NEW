<?php
if (isset($_POST["GENERATE"])) {
    $qrcode = $_POST["QRCODE"];
    echo "<img src='https://quickchart.io/qr?text=$qrcode' class='mb-4' style='border: 1px solid #343A40;'>";
}
