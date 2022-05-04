
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
  <a href="display_product.php" style="text-align: center;  margin-left: 650px;" >display table</a>
	<h3 style="text-align: center; margin-bottom: 20px; margin-top: 20px; font-family: serif;" >ADD NEW PRODUCT</h3>

<form  action="<?php echo $_SERVER['PHP_SELF'] ?>" id="productfrm" class="productfrm" name="productfrm" method="POST" enctype="multipart/form-data">

<label for="product_title">TITLE:-</label>
<input type="text" name="title" class="title"><br>

<label for="product_quantity">QUANTITY:-</label>
<input type="text" name="quantity" class="quantity"><br>

<label for="product_price">PRICE:-</label>
<input type="text" name="price" class="price"><br>

<label for="product_image">IMAGE:-</label>
<input type="file" name="image" class="image"><br>

<label for="product_description">DESCRIPTION:-</label>
<textarea name="description" class="description"></textarea><br>

<input style="text-align: center ; margin-left: 70px;" type="submit" name="buy" id="buy" value="insert-product"><br>
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

include "config_product.php";
if (isset($_POST['buy']))
{ 
  $title=$_POST['title'];
  $quantity=$_POST['quantity'];
  $price=$_POST['price'];
  echo"<pre>";
  print_r($image=$_FILES['image']['name']);
  echo"</pre>";
   $tempname = $_FILES["image"]["tmp_name"];
    $folder = "uploads/".$image;
  $description=$_POST['description'];

  $ins="INSERT INTO product(title,quantity,price,image,description) VALUES ('$title','$quantity','$price','$image','$description')";

     		echo "$ins";
        	$ival=mysqli_query($conn,$ins);
        	if($ival) 
        	 {        
        	  "data inserted in table";
        	 }
        	else
       	 	 {
        	 "error in insert data";
        	    }
        	    if (move_uploaded_file($tempname, $folder))  {
            echo  "Image uploaded successfully";
        }else{
            echo  "Failed to upload image";
      }
        	}
?>
