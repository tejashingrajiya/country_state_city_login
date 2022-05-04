<?php
include "config.php";

if(isset($_POST['id2'])){
	$id=$_POST['id2'];

	$sel_qu="SELECT * FROM states WHERE country_id='$id'";
	$dist=mysqli_query($conn,$sel_qu) or die(mysqli_error($conn));
		echo '<option value="">select state</option>';
		foreach ($dist as $value2)
		{
			echo '<option value='.$value2["id"].'>'.$value2["statename"].'</option>';
		}
		
							

}



?>
