<!-- connection with data base -->
<?php
include "config.php";

/*display query*/ 
//$oop="SELECT * FROM `cities` ct INNER JOIN states s ON ct.stateid = s.id INNER JOIN countries c ON ct.countryid =c.id";
//narayan query
$oop="SELECT ct.*,s.statename ,c.country_name FROM cities ct, states s, countries c where s.id = ct.stateid and c.id = ct.countryid";
$disp=mysqli_query($conn,$oop);

?>
<!DOCTYPE html>	
		<html>
		<head>
			<title>city_display</title>

			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
			
		</head>
		<body>
<a href="http://localhost/country_state_city/city/city_insert.php"></a>		
		<table id="example" class="display" style="width:100%">

			<thead>
            <tr>
                <th>cityID</th>
                <th>city</th>
                <th>stateID</th>
                <th>state</th>
                <th>countryID</th>
                <th>country</th>
                <th>update</th>          
                <th>delate</th>          
            </tr>
        	</thead>
        <tbody>
        	<?php
		 while($dis=mysqli_fetch_assoc($disp))
				{
 				  ?>
 			<tr>
				<td><?php echo $dis["id"]; ?></td>
				<td><?php echo $dis["cityname"]; ?></td>
				<td><?php echo $dis["stateid"]; ?></td>			
				<td><?php echo $dis["statename"]; ?></td>			
				<td><?php echo $dis["countryid"]; ?></td>			
				<td><?php echo $dis["country_name"]; ?></td>			
				<td><a href= "http://localhost/country_state_city/city/city_update.php?id=<?php echo $dis['id']; ?>">
					<input type="submit" name="update" value="update"></a></td>
			<td><a href="http://localhost/country_state_city/city/city_delete.php?id=<?php echo $dis['id']; ?>">
				<input type="submit" name="delete" value="delete"></a></td>
			</tr>
<?php
}

?>

         
        </tbody>
        <tfoot>
            <tr>
                <th>cityid</th>
                <th>city</th>
                <th>stateid</th>
                <th>state</th>
                <th>country</th>
                <th>update</th>
            	<th>delete</th>
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
