<?php

include 'config.php';

$id = isset($_GET['sid']) ? $_GET['sid'] : '';

$sql = "DELETE FROM statetbl WHERE sid='$id'";
if (mysqli_query($conn, $sql)) {
    header('http://localhost/country_state_city/state/state_display.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>