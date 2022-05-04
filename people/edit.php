<?php
	include("connection.php");
	
	if (isset($_POST['edit'])) {
		
		$id = $_GET['id'];
		$first_name = $_POST['name'];
		$address = $_POST['address'];
		$update="UPDATE `record` SET name='$first_name',address='$address' WHERE id='$id'";
		$query = mysqli_query($connection,$update);
		
		echo("record updated");
		}else("problem in update");
	?>
	<?php
		$id = $_GET['id'];
		$sql = "select * from record WHERE id='$id'";
		$rs = mysqli_query($connection,$sql);
		$row = mysqli_fetch_assoc($rs);
	?>	
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
				<input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>">
			</div>
			<div class="form-group">
				<label>Address</label>
				<input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="edit" >Update</button>
			</div>
		</form>
	</body>
</html>