<?php
session_start();
	//error_reporting (E_ALL ^ E_NOTICE);
	include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
<div>
<?php
	if (@$_GET['emp']==true) {
	?>
	<div class="alert-light text-danger text-center"><?php echo $_GET['emp'] ?></div>
	<?php
	}
?>	
<?php
	if (@$_GET['invalid']==true) {
	?>
	<div class="alert-light text-danger text-center"><?php echo $_GET['invalid'] ?></div>
	<?php
	}
?>	
</div>
<div class="container" align="center">
<h1>login page</h1>
<form action="pass.php" id="Registration_Form" name="myForm" method="POST" enctype="multipart/form-data">

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