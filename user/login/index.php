<?php

	//error_reporting (E_ALL ^ E_NOTICE);
	include "config.php";
	session_start();
	
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

<label  for="email">UserId:</label>
<input type="text" id="email" name="email" placeholder="Email-id" class="email">
<br>

<label for="password">Password:</label>
<input type="password" id="password" name="password" placeholder="please enter Password" class="password"><br>

<input type="submit"  id="insert" name="insert"  value="login.">
</form>
</div>
</body>
</html> 

<?php 
if(isset($_POST['insert']))
{	$email=$_POST['email'];
	$number=$_POST['email'];
	$pass=$_POST['password'];
	$var="SELECT * FROM tbl2 WHERE (email='$email' or number='$email')AND Password ='$pass'";
	$result = mysqli_query($conn,$var) or die("quri failed");
	if (mysqli_num_rows($result)> 0) {
		$row=mysqli_fetch_assoc($result);
		$_SESSION["emailid"]=$row['email'];
		$_SESSION["password"]=$row['Password'];
		$_SESSION["id"]=$row['id'];
		$_SESSION["username"]=$row['username'];

		header("Location:wellcome.php");
	}else{
		echo "user name and password not matched";
	}
}
?>
