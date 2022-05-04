<!-- connection with data base -->
<?php
include "config.php";

/*display query*/ 
$oop="SELECT * FROM countries";
$disp=mysqli_query($conn,$oop);
if(mysqli_num_rows($disp))
 {
?>
<!DOCTYPE html>	
		<html>
		<head>
			<title>country_display</title>

			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
			
		</head>
		<body>
<a href="http://localhost/country_state_city/country/country_insert.php">
				<input type="submit" name="INSERT" value="INSERT"></a>		
		<table id="example" class="display" style="width:100%">

			<thead>
            <tr>
                <th>id</th>
                <th>country</th>
                <th>Action</th>          
            </tr>
        	</thead>
        <tbody>
        	<?php
		 while($dis=mysqli_fetch_assoc($disp))
				{
 				  ?>
 			<tr>
				<td><?php echo $dis["id"]; ?></td>
				<td><?php echo $dis["country_name"]; ?></td>
				<td><a href= "http://localhost/country_state_city/country/country_update.php?id=<?php echo $dis['id']; ?>">
					<input type="submit" name="update" value="update"></a>
			<a href="http://localhost/country_state_city/country/country_delete.php?id=<?php echo $dis['id']; ?>">
				<input type="submit" name="delete" value="delete"></a></td>
			</tr>
<?php
}
}
?>

         
        </tbody>
        <tfoot>
            <tr>
                <th>id</th>
                <th>country</th>
                <th>Action</th>
            </tr>
        </tfoot>
			
</table>

</body>
</html>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
});

</script>