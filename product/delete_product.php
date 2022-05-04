<?php

include 'config_product.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql = "DELETE FROM product WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
    header('location:http://localhost/country_state_city/product/display_product.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>