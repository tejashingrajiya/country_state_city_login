<?php
	//error_reporting (E_ALL ^ E_NOTICE);
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<style>
	.error 
	{
		color:red;
	}
</style>
</head>
<body>
	<a href="http://localhost/country_state_city/user"><u>directory</u></a>  
	<a href="http://localhost/country_state_city/user/viewnew.php"><u>view table</u></a> <div class="regform">

		<h1>User Registration Form</h1>
		<form action="" id="Registration_Form" name="myForm" method="POST" enctype="multipart/form-data" class="countryform">

			<label for="firstname">First Name:</label>
			<input type="text" id="firstname" name="firstname" class="f_name">
			<small class="errorinf_name" style="color:red;"></small><br>

			<label for="lastname">Last Name:</label>
			<input type="text" id="lastname" name="lastname" class="l_name">
			<small class="errorinl_name" style="color:red;"></small><br>

			<label for="gender">Gender:</label>
			<input type="radio" id="gender" name="gender" value="male"  />Male
			<input type="radio" id="gender" name="gender" value="female" />Female
			<input type="radio" id="gender" name="gender" value="Other" />Other<br>

			<label for="checkbox">Education:</label>
			<input type="checkbox" id="education" class="educationclass" name="education[]" value="10th">10th
			<input type="checkbox" id="education" class="educationclass" name="education[]" value="12th">12th
			<input type="checkbox" id="education" class="educationclass" name="education[]" value="BCA">BCA
			<input type="checkbox" id="education" class="educationclass" name="education[]" value="BE">BE
			<input type="checkbox" id="education" class="educationclass" name="education[]" value="BSC">BSC
			<input type="checkbox" id="education" class="educationclass" name="education[]" value="MCA">MCA
			<input type="checkbox" id="education" class="educationclass" name="education[]" value="ME">ME
			<input type="checkbox" id="education" class="educationclass" name="education[]" value="MSC">MSC
			<input type="checkbox" id="education" class="educationclass" name="education[]" value="Phd">Phd<br>

			<label for="username">Username:</label>
			<input type="text" id="username" name="username" class="user">
			<small class="errorinusrnam" style="color:red;"></small><br>

			<label for="email">Email:</label>
			<input type="text" id="email" name="email" class="e_mail" >
			<small class="errorinmail" style="color:red;"></small>
			<span class="error"></span><br>

			<label for="number">Mobile Number:</label>
			<input type="text" id="number" name="number" class="mobile_num" >
			<small class="errorinnumber" style="color:red;"></small><br>

			<label for="Password">Password:</label>
			<input type="password" id="Password" name="Password" class="pass_word" >
			<small class="errorinpassword" style="color:red;"></small><br>

			<label for="Conform_Password">Conform Password:</label>
			<input type="password" id="Conform_Password" name="Conform_Password" class="conf_password" >
			<small class="errorinconformpassword" style="color:red;"></small><br>

			<label for="image">Image:</label>
			<input type="file" id="uploadfile" name="uploadfile" multiple >

			<div class="name">
				<label for="country">Country:</label>	
				<?php
				$sel="SELECT * FROM countries";
				$dis=mysqli_query($conn,$sel) or die(mysqli_error($conn));
				?>
				<select name="country_name" id="country">
					<option value=''>select country</option>
					<?php 
					foreach ($dis as $value) 
					{
						echo '<option value='.$value["id"].'>'.$value["country_name"].'</option>';
					}
					?>
				</select>
			</div>
			<div class="name">
				<label for="state">State:</label>
				
				<select name="state_name" id="state">
					<option value=''>select state</option>
				</select>
			</div>
			<div class="name">
				<label for="city_name">City:</label>
				<select name="city_name" id="city">
					<option value=''>select city</option>			
				</select>
			</div>
			
			<input type="submit"  id="submit" name="insert"  value="insert" >
		</form>
	</div><br>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#Registration_Form').on('submit',(function(e) {
			e.preventDefault();
			$.ajax({
				type:"POST",
				url:"insert_includenew.php",
				data: new FormData(this),
				contentType: false,
				cache: false, 
				processData:false,
				success: function(data){
					alert("Data inserted successfully");
					console.log(data);
					alert(data);
				},
				error: function(){}

			});
		}));
	});
</script>

<script type="text/javascript">
	$(document).ready(function() 
	{
		$('#country').on('change',function ()
		{
			var countryid = $(this).val();
			//alert(countryid);
			$.ajax
			({
				method:'POST',
				url:'country_state_listajax.php',
				data:{country_id:countryid},
				dataType:'html',
				success:function(data)
				{
					$('#state').html(data);

				}		
			});	
		});
	});
	$(document).ready(function() 
	{
		$('#state').on('change',function ()
		{
			var state_ide = $(this).val();
			$.ajax
			({
				method:'POST',
				url:'country_state_listajax.php',
				data:{stateid:state_ide},
				dataType:'html',
				success:function(data)
				{
					$('#city').html(data);
				}		
			});	
		});
	});
</script>

