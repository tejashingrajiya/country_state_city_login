<?php
  include ('config.php');
 
$id = isset($_GET['id']) ? $_GET['id'] : '';	//print_r($id);
	$var="SELECT * FROM countries WHERE id='$id'";
  
  $query=mysqli_query($conn, $var) or die("Failed Select." . mysqli_error($conn));

    if(mysqli_num_rows($query) > 0)
    {
      while($row = mysqli_fetch_assoc($query))
      {
?>
<!DOCTYPE html>
<html>
<head>
  <link rel=" " href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqBootstrapValidation/1.3.6/jqBootstrapValidation.js"></script>
    
  
  <title>updatedata</title>
</head>
<body>
  <form  action="" method="POST" class="countryform">
  <div class="head" >
  <h1>Enter Country</h1>
  </div>

  <!-- <div class="id">
  <label for="id"><h2>insert id:</h2></label>
  <input type="text" id="id" name="id"><br><br> 
  </div> -->

  <div class="name">
  <label for="country"><h2>insert country:</h2></label>
  <input type="text" id="country" name="country_name" value="<?php echo $row['country_name']?>"><br><br> 
  </div>

  <div class="submit">
  <input type="submit"  id="submit" name="update"  value="insert">
  </div>
</form><?php     
}
  }
?>
</body>
</html>



<?php
if(isset($_POST['update'])){
        
  $id = $_GET['id'];
  $country = $_POST['country'];


$stat = "UPDATE countrytbl SET country='$country' WHERE id ='$id'";
        $updt = mysqli_query($conn,$stat) or die("Failed Update.". mysqli_error($conn));
        if($updt)
        {
header('location: country_display.php');
        }else{
          echo "Failed Updated.";
        }
}
?>
