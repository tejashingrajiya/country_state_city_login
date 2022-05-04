<?php
include "config.php";
?>
<html>
<head>

<!-- 	<link rel="stylesheet" href="style2.css"/> -->
<!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> -->
<title>Insert state</title>
<script type="text/javascript">
</script>
</head>

<body>

<form  action="" method="POST" class="countryform">
	<div class="head">
	<h1>Enter State</h1>
	</div>

	<div class="name">
	<label for="country"><h2>choose country firsts:</h2></label>
	
	
	<?php
	$sel="SELECT * FROM countries";
	$dis=mysqli_query($conn,$sel) or die(mysqli_error($conn));
	?>
	<select name="country_id" id="country_id">
		<option value=''>select country</option>
		<?php 
		foreach ($dis as $value) {
		 	$array_counter=$value["country_name"];
			$array_id=$value["id"];
		?>	

		<option value="<?php echo $array_id; ?>"><?php echo $array_counter; ?></option>



	<?php } ?>

	</select>
		</div>
	<div class="name">
	<label for="state"><h2>insert state:</h2></label>
	<input type="text" id="state" name="statename"><br><br>	
	</div>

	<div class="submit">
	<input type="submit"  id="submit" name="insert"  value="insert">
	</div>
</form>

<?php
if(isset($_POST['insert']))
{
	$country=$_POST['country_id'];
	$state=$_POST['statename'];


	$ins_q="INSERT INTO states (statename,country_id) VALUES ('$state','$country')";
	$ins_c=mysqli_query($conn,$ins_q);
	  	if($ins_c)
	  			{
			  	echo"data inserted in table";
			    }
			    else
			    {
			    echo "error in insert data";
			    }
			  
}
?>
</body>
</html>