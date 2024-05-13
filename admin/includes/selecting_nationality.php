<?php
include("nationalities_list.php");

// Sort the countries array by nationality
array_multisort(array_column($countries, 'nationality'), SORT_ASC, $countries);

foreach ($countries as $country) {
    echo "<option value='" . $country['nationality'] . "'>" . $country['nationality'] . "</option>";
}