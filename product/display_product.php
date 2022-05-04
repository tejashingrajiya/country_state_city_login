
<?php
include "config_product.php";
$sql = "SELECT * FROM product";
if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        ?>
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body>
    <a href="insert_product.php">insert</a>

        <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
        <th>(ID)</th>
        <th>Product Name</th>
        <th>QUANTITY</th>
        <th>Price (INR)</th>
        <th>Image</th>
        <th>DESCRIPTION</th>
        <th>update</th>
        <th>delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>  
            
             <tr>             
             <td><?php echo $row['id']; ?></td>
             <td><?php echo $row['title']; ?></td>
             <td><?php echo $row['quantity']; ?></td>
             <td><?php echo $row['price']; ?></td>

             <td><img src="uploads/<?php echo $row['image']; ?>" width=150px height="150px"></td>
             <td><?php echo $row['description'];?></td>
            <td><a href="update_product.php?id=<?php echo $row['id']; ?>"><input type="submit" name="update" value="update"></a></td>
            <td><a href="delete_product.php?id=<?php echo $row['id']; ?>"><input type="submit" name="delete" value="delete"></a></td>
            </tr>
        <?php
        }
        ?>
        </tbody>

        <thead>
        <tr>
        <th>(ID)</th>
        <th>Product Name</th>
        <th>QUANTITY</th>
        <th>Price (INR)</th>
        <th>Image</th>
        <th>DESCRIPTION</th>
        <th>update</th>
        <th>delete</th>
        </tr>
        </thead>
        
        </table>
        </body>
        </html>
        <?php
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records found";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
print_r($img=$row['image']);
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
});

</script>
<!-- http://localhost/country_state_city/product/delete.php -->