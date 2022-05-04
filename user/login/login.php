<?php
	//error_reporting (E_ALL ^ E_NOTICE);
	include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
<div class="container" align="center">
<h1>login page</h1>
<form action="" id="Registration_Form" name="myForm" method="POST" enctype="multipart/form-data">

<label  for="user_id">UserId:</label>
<input type="text" id="user_id" name="user_id" placeholder="Email-id/Mobile-number" class="user_id">
<br>

<label for="password">Password:</label>
<input type="password" id="password" name="password" placeholder="please enter Password" class="password"><br>

<input type="submit"  id="insert" name="insert"  value="login">
</form>
</div>
</body>
</html>

<?php print_r($_POST);
if (isset($_POST))
{ 	
  $user_id=$_POST['email'];
  $user_id=$_POST['number'];
  $pass=$_POST['password'];
$query_log="SELECT * FROM tbl2 WHERE email='$user_id' or number='$user_id' AND Password='$pass'";
$join= mysqli_query($conn, $query_log) or die("Failed Select." . mysqli_error($conn));
  
 if($join) 
        	 {        
        	  echo "select query ok";
        	 }
        	else
       	 	 {
        	 echo "error in select query";
        	    }
        	  }
?>
