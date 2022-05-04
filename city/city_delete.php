<?php

include 'config.php';

$id = isset($_GET['cid']) ? $_GET['cid'] : '';

$sql = "DELETE FROM citytbl WHERE cid='$id'";
if (mysqli_query($conn, $sql)) {
    header('http://localhost/country_state_city/city/city_display.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>