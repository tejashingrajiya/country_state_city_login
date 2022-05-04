<?php

include 'config.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql = "DELETE FROM users WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
    header('location:http://localhost/country_state_city/user/view_old.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>