<?php

include 'config.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql = "DELETE FROM countrytbl WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
    header('http://localhost/country_state_city/country/country_display.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>