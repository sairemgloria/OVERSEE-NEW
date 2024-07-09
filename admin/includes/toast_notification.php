<?php

// THIS CODE BELOW DISPLAY THE ERROR MESSAGE OF FIELDS ARE NEEDED TO FILLED UP
if (isset($_SESSION["error"])) {
    echo '<div class="alert alert-danger font-small mb-2" id="toastError" style="margin: 0;">' . $_SESSION["error"] . "</div>";
    unset($_SESSION["error"]); // CLEAR THE ERROR MESSAGE AFTER DISPLAYING IT
}
// THIS CODE BELOW DISPLAY THE SUCCESS MESSAGE IF THERES NO FIELDS EMPTY AND SUCCESS REGISTERED
if (isset($_SESSION["success"])) {
    echo '<div class="alert alert-success font-small mb-2" id="toastSuccess" style="margin: 0;">' . $_SESSION["success"] . "</div>";
    unset($_SESSION["success"]); // CLEAR THE ERROR MESSAGE AFTER DISPLAYING IT
}