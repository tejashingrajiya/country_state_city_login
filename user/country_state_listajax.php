<?php
include "config.php";

if(isset($_POST['country_id'])){
	$id=$_POST['country_id'];

	$sel_qu="SELECT * FROM states WHERE country_id='$id'";
	$dist=mysqli_query($conn,$sel_qu) or die(mysqli_error($conn));

		$data = '<option value="">select state</option>';
		foreach ($dist as $value2) 
		{
			$data .= '<option value='.$value2["id"].'>'.$value2["statename"].'</option>';
		}
							
		echo $data;
	}
if(isset($_POST['stateid'])){
	$id=$_POST['stateid'];

	$sel_qu="SELECT * FROM cities WHERE stateid='$id'";
	$dist=mysqli_query($conn,$sel_qu) or die(mysqli_error($conn));

		$data1 = '<option value="">select city</option>';
		foreach ($dist as $value2) 
		{
			$data1 .= '<option value='.$value2["id"].'>'.$value2["cityname"].'</option>';
		}
		echo $data1;
	}
?>