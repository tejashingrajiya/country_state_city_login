
<?php
include "config.php";

/* $oop="SELECT tbl2.*,countrytbl.country as country_name,statetbl.state as state_name , citytbl.city as city_name FROM tbl2 INNER JOIN countrytbl ON countrytbl.id=tbl2.country INNER JOIN statetbl ON statetbl.sid=tbl2.state INNER JOIN citytbl ON citytbl.cid=tbl2.city"; */
$oop="SELECT * FROM users";
$disp=mysqli_query($conn,$oop);

 if(mysqli_num_rows($disp))
 {
?>
		<!DOCTYPE html>	
		<html>
		<head>
			<title>table display</title>
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
		</head>
		<body>
		<a href="http://localhost/country_state_city/user"><u>directory</u></a>  
		<a href="insert_old.php">insert</a>

		<table id="example" class="display" style="width:100%">
		
		<thead>
		<tr>
			<th>id</th>
			<th>firstname</th>
			<th>lastname</th>
			<th>Gender</th>
			<th>study</th>
			<th>username</th>
			<th>email</th>
			<th>number</th>
			<th>Password</th>
			<th>Conform_Password</th>
			<th>image</th>
			<th>country</th>
			<th>state</th>
			<th>city</th>
			<th>delete</th>
			<th>update</th>
			
		</tr>
		</thead>
 <?php
 while($dis=mysqli_fetch_assoc($disp))
	{
 ?>
		<tr>
			<td><?php echo $dis["id"]; ?></td>
			<td><?php echo $dis["firstname"]; ?></td>
			<td><?php echo $dis["lastname"]; ?></td>
			<td><?php echo $dis["gender"]; ?></td>
			<td><?php echo $dis["education"]; ?></td>
			<td><?php echo $dis["username"]; ?></td>
			<td><?php echo $dis["email"]; ?></td>
			<td><?php echo $dis["number"]; ?></td>
			<td><?php echo $dis["Password"]; ?></td>
			<td><?php echo $dis["Conform_Password"]; ?></td>

<td><?php
				$for=$dis["uploadfile"];
				$expl=explode(" , " , $for);
				
				foreach($expl as $abc){
		?>
			<img src= "images/<?php echo $abc; ?>" width=100 height=100 >
		<?php			
		}
		?></td>
			<td><?php echo $dis["country_name"]; ?></td>
			<td><?php echo $dis["state_name"]; ?></td>
			<td><?php echo $dis["city_name"]; ?></td>
			<td><a href="update_old.php?id=<?php echo $dis['id']; ?>"><input type="submit" name="update" value="update"></a></td>
			<td><a href="delete_old.php?id=<?php echo $dis['id']; ?>"><input type="submit" name="delete" value="delete"></a></td>	

		</tr>
		<?php
		}
 }
?>	
</table>
 <a href="insert.php">insert</a>
</body>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
});

</script>
