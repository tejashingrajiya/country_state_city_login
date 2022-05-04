
<?php
session_start();
include "config.php";
include "C:\wamp64\www\country_state_city\product\config_product.php";
if (!isset($_SESSION["emailid"])) {
        echo "you are logged out";
         header("Location:index.php");
        }

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
<style>
    .box{
        margin-top: 0px;
        display: inline-block;
        width: 200px;
        height: 300px;
        vertical-align: bottom;
        border: 1px solid black;
        padding: 150px;
  
        }
    .BUY-NOW
        {
        font-size : 20px;
        margin-bottom: 100px;
        }

</style>
</head>
<body>
    
<?php
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <div class="box">
             <div class="title">Title:- <?php echo $row['title']; ?></div>
             <div class="quantity">Quantity:- <?php echo $row['quantity']; ?></div>
             <div class="price">Price:-<?php echo $row['price']; ?></div>

             <div class="image">Image:- <img src="/country_state_city/product/uploads/<?php echo $row['image']; ?>" width=250px height="250px"></div>
             <div id="showmore">
             <div class="description">Description:-<?php echo $row['description'];?></div>
             </div>
             <div class="ADD-TO-CART"><a href="update_product.php?id=<?php echo $row['id']; ?>"><input type="submit" name="ADD-TO-CART" value="ADD-TO-CART"></a></div>
            <div class="BUY-NOW"><a href="delete_product.php?id=<?php echo $row['id']; ?>"><input  type="submit" name="BUY-NOW" value="BUY-NOW"></a></div>
            </div>
             <?php
            }
            ?>
        
    
    </body>
    </html>
<?php 
} else {
        echo "No records found";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
?>