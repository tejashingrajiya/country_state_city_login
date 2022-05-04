<?php
	include("connection.php");

	$sql = 'select * from record order by id desc';
	$rs = mysqli_query($connection,$sql);
	?>
		
		<table class="table">
			<tr>
				<th>id</th>
				<th>Author</th>
				<th>address</th>
				<th>Action</th>
			</tr>
			<?php 
				while($row = mysqli_fetch_assoc($rs))
				{
					//$created = date('d-m-Y',strtotime($row['created']));
			?>
					<tr>
						<td> <?php echo $row['id']?> </td>
						<td> <?php echo $row['name']?> </td>
						<td> <?php echo $row['address']?> </td>
						<td>  
							<a href="edit.php?id=<?php echo $row['id']?>" >Edit</a>	
						</td>
					</tr>
			<?php 
				}
			?>
		</table>