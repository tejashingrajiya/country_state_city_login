<?php

 include ('config_product.php');
if (isset($_POST['update']))
{ print_r($_POST);
 $id =$_POST['id'];
  $title=$_POST['title'];
  $quantity=$_POST['quantity'];
  $price=$_POST['price'];
  $image=$_FILES['image']['name'];
  echo"<pre>";
  print_r($image2=$_FILES['image']);
  $tempname = $_FILES["image"]["tmp_name"];
  $folder = "uploads/".$image;
  echo"</pre>";
    /*$tempname = $_FILES["image"]["tmp_name"];
    $folder = "uploads/".$image;
*/  $description=$_POST['description'];
 
  $ins="UPDATE product SET title='$title',quantity='$quantity',price='$price',image='$image',description='$description' WHERE id={$id}";

        echo $ins;
          $ival=mysqli_query($conn,$ins) or die("Failed Update.". mysqli_error($conn));
          echo $ival;
          if($ival) 
           { 
           header('location:http://localhost/country_state_city/product/display_product.php');
          }
          else
           {
           echo "error in uploads data";
              }
              if (move_uploaded_file($tempname, $folder))  {
            echo  "Image uploaded successfully";
        }else{
            echo  "Failed to upload image";
      }
          }
?>

<?php
  include ('config_product.php');
$id = isset($_GET['id']) ? $_GET['id'] : '';
  $var="SELECT * FROM product WHERE id='$id'";
  
  $query=mysqli_query($conn, $var) or die("Failed Select." . mysqli_error($conn));

    if(mysqli_num_rows($query) > 0)
    {
      while($row = mysqli_fetch_assoc($query))
      {
?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ecommerce</title>
  <style>
   .error 
   {
    color:red;
   }
   .productfrm{
    font-size: 20px;
    margin: 0 auto; 
    width:250px;
   }
   </style>
</head>
<body>
  <h3 style="text-align: center; margin-bottom: 20px; margin-top: 20px; font-family: serif;" >UPDATE PRODUCT</h3>

<form  action="<?php echo $_SERVER['PHP_SELF'] ?>" id="productfrm" class="productfrm" name="productfrm" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo $id?>">

<label for="product_title">TITLE:-</label>
<input type="text" name="title" class="title"
 value="<?php echo $row['title']; ?>"><br>

<label for="product_quantity">QUANTITY:-</label>
<input type="text" name="quantity" class="quantity" value="<?php echo $row['quantity']; ?>"><br>

<label for="product_price">PRICE:-</label>
<input type="text" name="price" class="price" value="<?php echo $row['price']; ?>"><br>

<label for="product_image">IMAGE:-</label>
<input type="file" name="image" class="image"><br>
<img src="uploads/<?php echo $row['image']; ?>" width=150px height="150px"><br>

<label for="product_description">DESCRIPTION:-</label>
<textarea name="description" class="description"> <?php echo $row['description']? $row['description'] : '' ; ?></textarea><br>

<input style="text-align: center ; margin-left: 70px;" type="submit" name="update" id="update" value="update-product"><br>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript">
// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='productfrm']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      title: "required",
      quantity: "required",
      price: "required",
      image: "required",
      description: "required",
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>
</body>
</html>
<?php
}
}
?>


