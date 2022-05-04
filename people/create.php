<!DOCTYPE html>
<html>
	<head>
		<title>CRUD: CReate, Update, Delete PHP MySQL</title>
				<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	</head>
	<body>
		<form method="post" action="" >
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name" value="">
			</div>
			<div class="form-group">
				<label>Address</label>
				<input type="text" class="form-control" name="address" value="">
			</div>
			<div class="input-group">
				<button class="btn btn-primary" type="submit" name="save" >Save</button>
			</div>
		</form>
	</body>
</html>
<?php
	include("connection.php");
	
	if (isset($_POST['save'])) {
		
		$first_name = $_POST['name'];
		$address = $_POST['address'];
		$insert="INSERT INTO  record (`name`, `address`) VALUES ('$first_name','$address')";
		$query = mysqli_query($connection,$insert);
		
		echo("record inserted");
		} 
		else{
					echo("error in inserted");

			}
	