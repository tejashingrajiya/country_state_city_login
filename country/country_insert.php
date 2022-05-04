<?php
include "config.php";
?>
<html>
<head>

	<!-- <link rel="stylesheet" href="style2.css"/> -->
<!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> -->
<title>Insert country</title>
<script type="text/javascript">
</script>
</head>

<body>

<form  action="" method="POST" class="countryform">
	<div class="head" >
	<h1>Enter Country</h1>
	</div>

	<!-- <div class="id">
	<label for="id"><h2>insert id:</h2></label>
	<input type="text" id="id" name="id"><br><br>	
	</div> -->

	<div class="name">
	<label for="country"><h2>insert country:</h2></label>
	<input type="text" id="country_name" name="country_name"><br><br>	
	</div>

	<div class="submit">
	<input type="submit"  id="submit" name="insert"  value="insert">
	</div>
						

</form>
	<!-- <a href="http://localhost/country_state_city/country/country_insert.php">
				<input type="submit" name="INSERT" value="INSERT"></a> -->

				<a href="http://localhost/country_state_city/country/country_display.php">
		<input type="submit" name="TABLE" value="TABLE"></a>
<?php
if(isset($_POST['insert']))
{
	//$id=$_POST['id'];
	$country_name=$_POST['country_name'];

	$ins_q="INSERT INTO countries (country_name) VALUES ('$country_name')";
	$ins_c=mysqli_query($conn,$ins_q);
	  	if($ins_c)
	  	//	echo "$ins_c";
	  			{
			  	echo"data inserted in table";
			    }
			    else
			    {
			    echo "error in insert data";
			    }
			  
}//9016201780

?>
<a href="http://localhost/country_state_city/country/country_display.php">

</body>
</html>