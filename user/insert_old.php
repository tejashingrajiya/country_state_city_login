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
		<a href="http://localhost/country_state_city/user/view.php"><u>view table</u></a> <div class="regform">
			
			<h1>User Registration Form</h1>
			<form action="" id="Registration_Form" name="myForm" method="POST" enctype="multipart/form-data" class="countryform">
				
				<label for="firstname">First Name:</label>
				<input type="text" id="firstname" name="firstname" class="f_name">
				<small class="errorinf_name" style="color:red;"></small><br>
				
				<label for="lastname">Last Name:</label>
				<input type="text" id="lastname" name="lastname" class="l_name">
				<small class="errorinl_name" style="color:red;"></small><br>
				
				
				<label for="gender">Gender:</label><br>
				<input type="radio" id="gender" name="gender"  value="male">Male
				<input type="radio" id="gender" name="gender"  value="female">Female
				<input type="radio" id="gender" name="gender"  value="other">Other<br>
				
				<label for="checkbox">Education:</label>
				<input type="checkbox" id="education" name="education[]" value="10th">10th
				<input type="checkbox" id="education" name="education[]" value="12th">12th
				<input type="checkbox" id="education" name="education[]" value="BCA">BCA
				<input type="checkbox" id="education" name="education[]" value="BE">BE
				<input type="checkbox" id="education" name="education[]" value="BSC">BSC
				<input type="checkbox" id="education" name="education[]" value="MCA">MCA
				<input type="checkbox" id="education" name="education[]" value="ME">ME
				<input type="checkbox" id="education" name="education[]" value="MSC">MSC
				<input type="checkbox" id="education" name="education[]" value="Phd">Phd<br>
				
				
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
				<input type="file" id="uploadfile" name="uploadfile[]" multiple >
				
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
					<label for="city">City:</label>									
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
<script>
	$(document).ready(function() {
		$("#Registration_Form").validate({
			
			rules: {
				firstname: 'required',
				lastname: 'required',
				gender: {
					required: true,
				},
				username: {
					required: true,
				},
				email: {
					required: true,
					email: true,
					maxlength: 55,
					/*remote:
						{
						url: 'checkemailjquery.php',
						type: 'POST',
					}*/
				},
				number: {
					required: true,
					number:true,
					minlength:10, 
					maxlength:10,
				},
				Password: 'required',
				Conform_Password: {
					required: true,
					minlength:10,		
					equalTo: "#Password"
				},
				
				country_name: {
					required: true,
				},
				state_name: {
					required: true,
				},
				city_name: {
					required: true,
				},
			},
			messages: {
				//firstname: 'This field is required',
				//lastname: 'This field is required',
				email:'mail exists email.',
				Password:'10 digit required.',
			},
				
			submitHandler: function(form) { 
				//alert("Do some stuff...");
				var firstname = $('#firstname').val();
				var lastname=$('#lastname').val();
				var gender=$('#gender').val();
				var education=$('#education').val();
				var username=$('#username').val();
				var email = $('#email').val();
				var number = $('#number').val();
				var country_name=$('#country').val();
				var state_name=$('#state').val();
				var city_name=$('#city').val();
				var Password=$('#Password').val();
				var Conform_Password=$('#Conform_Password').val();
				
				
				//alert(firstname);
				$.ajax({
					type:"POST",
					url:"insert_include_old.php",
					data: $(form).serialize(),
					success:function(response){
					console.log(country_name);
					}
					
				});
				return false;  //This doesn't prevent the form from submitting.
			}
		});
		/*	$('#submit').on('click', function() {
			//$("#submit").attr("disabled", "disabled");
			var firstname = $('#firstname').val();
			var email = $('#email').val();
			var number = $('#number').val();
			//alert(firstname);
			$.ajax({
			type:"POST",
			url:"insert_include.php",
			data:{
			firstname: firstname,
			email: email,
			number: number,
			},
			success:function(response){
			alert("success");
			}
			
			});
		}); */
	});
</script>
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
					//$('#ct').html('select state first');
				}		
			});	
		});
	});
	$(document).ready(function() 
	{
		$('#state').on('change',function ()
		{
			var stateid = $(this).val();
			$.ajax
			({
				method:'POST',
				url:'country_state_listajax.php',
				data:{stateid:stateid},
				dataType:'html',
				success:function(data)
				{
					$('#city').html(data);
					//$('#ct').html('select state first');
				}		
			});	
		});
	});
</script>

