<?php
  include ('config.php');
 
$id = isset($_GET['cid']) ? $_GET['cid'] : '';  //print_r($id);
  $var="SELECT * FROM citytbl WHERE cid='$id'";
  
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
    
  
  <title>updatecityname</title>
</head>
<body>
  <form  action="" method="POST" class="countryform">
  <div class="head" >
  <h1>Enter city</h1>
  </div>

  

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
            <label for="state"><h2>choose state:</h2></label>
            <?php
            $sel_qu="SELECT * FROM statetbl";
            $dist=mysqli_query($conn,$sel_qu) or die(mysqli_error($conn));
            ?>
            <select name="state" id="stt">
              <option value=''>select state</option>
              <?php 
              foreach ($dist as $value2) 
              {
                echo '<option value='.$value2["sid"].'>'.$value2["state"].'</option>';
              }
              ?>

            </select>
            </div>

  <div class="name">
  <label for="city"><h2>insert city:</h2></label>
  <input type="text" id="city" name="city" value="<?php echo $row['city']?>"><br><br> 
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
      
  $id = $_GET['cid'];
  $city = $_POST['city'];
  $stateid=$_POST['state'];

 

  $stat = "UPDATE citytbl SET city='$city', sid='$stateid' WHERE cid ='$id'";

        $updt = mysqli_query($conn,$stat) or die("Failed Update.". mysqli_error($conn));
        if($updt)
        {
           header('location: city_display.php');
        }else{
          echo "Failed Updated.";
        }
}
?>
<script type="text/javascript">
      $(document).ready(function() {
          $('#countery').on('change',function () {
            var cntryid = $(this).val();
              $.ajax({
                method:'POST',
                url:'country_state_list_ajax.php',
                data:{id:cntryid},
                dataType:'html',
                success:function(data){
                  $('#stt').html(data);
                  //$('#ct').html('select state first');
                }
              });
            
          });
        });
          

        </script>
        