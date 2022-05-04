<?php
  include ('config.php');
 
$id = isset($_GET['sid']) ? $_GET['sid'] : '';	//print_r($id);
	$var="SELECT * FROM statetbl WHERE sid='$id'";
  
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
  <h1>Enter states</h1>
  </div>

  <!-- <div class="id">
  <label for="id"><h2>insert id:</h2></label>
  <input type="text" id="id" name="id"><br><br> 
  </div> -->

  <div class="name">
  <label for="country"><h2>choose country firsts:</h2></label>
  <?php
  $sel="SELECT * FROM countrytbl";
  $dis=mysqli_query($conn,$sel) or die(mysqli_error($conn));
  ?>
  <select name="country" id="countery">
   <option value=''>select country</option>
    <?php 
    foreach ($dis as $value) {
      $array_counter=$value["country"];
      print_r($array_counter);
      $array_id=$value["id"];
    ?>  

    <option value="<?php echo $array_id; ?>"><?php echo $array_counter; ?></option>



  <?php } ?>

  </select>
    </div>


  <div class="name">
  <label for="state"><h2>insert state:</h2></label>
  <input type="text" id="state" name="state" value="<?php echo $row['state']?>"><br><br> 
  </div>

  <div class="submit">
  <input type="submit"  id="submit" name="update"  value="insert">
  </div>
</form>
<?php     
}
}
?>
</body>
</html>



<?php
if(isset($_POST['update'])){
      
  $id = $_GET['sid'];
  $state = $_POST['state'];
  $c_id=$_POST['country'];
 

$stat = "UPDATE statetbl SET state='$state', id='$c_id' WHERE sid ='$id'";
        $updt = mysqli_query($conn,$stat) or die("Failed Update.". mysqli_error($conn));
        if($updt)
        {
           header('location: state_display.php');
        }else{
          echo "Failed Updated.";
        }
}
?>

        