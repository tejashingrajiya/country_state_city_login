<?php
	include ('config.php');
	include('update_include_old.php');
	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$var="SELECT * FROM users WHERE id='$id'";
	
	$query=mysqli_query($conn, $var) or die("Failed Select." . mysqli_error($conn));
	
	if(mysqli_num_rows($query) > 0)
	{
		while($row = mysqli_fetch_assoc($query))
		{
			
			$explod_education=explode(" , ", $row["education"]);
			
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
				<title>updatedata</title>
			</head>
			<body>
				<div class="regform">
					<h1>Registration_Form</h1>
					
					<form action="" id="Registration_Form" name="myForm" method="POST" enctype="multipart/form-data" class="countryform">
						
						<label for="firstname">First Name:</label>
						<input type="text" id="firstname" name="firstname" class="st" value="<?php echo $row['firstname']; ?>">
						<small class="errorinf_name" style="color:red;"></small><br>
						
						<label for="lastname">Last Name:</label>
						<input type="text" id="lastname" name="lastname" class="ct" value="<?php echo $row['lastname']; ?>">
						<small class="errorinl_name" style="color:red;"></small><br>
						
						<label for="gender">Gender:</label>
						<input type="radio" name="gender"  value="male" <?php  if($row["gender"]=='male'){echo"checked";} ?>>Male
						<input type="radio" name="gender"  value="female"<?php  if($row["gender"]=='female'){echo"checked";} ?>>Female
						<input type="radio" name="gender"  value="other"<?php  if($row["gender"]=='other'){echo"checked";} ?>>Other
						
						<label for="checkbox">Education:</label>
						<input type="checkbox" name="education[]" value="10th"<?php  if(in_array("10th",$explod_education)){echo"checked";} ?>>10th
						<input type="checkbox" name="education[]" value="12th"<?php  if(in_array("12th",$explod_education)){echo"checked";} ?>>12th
						<input type="checkbox" name="education[]" value="BCA"<?php  if(in_array("BCA",$explod_education)){echo"checked";} ?>>BCA
						<input type="checkbox" name="education[]" value="BE"<?php  if(in_array("BE",$explod_education)){echo"checked";} ?>>BE
						<input type="checkbox" name="education[]" value="BSC"<?php  if(in_array("BSC",$explod_education)){echo"checked";} ?>>BSC
						<input type="checkbox" name="education[]" value="MCA"<?php  if(in_array("MCA",$explod_education)){echo"checked";} ?>>MCA
						<input type="checkbox" name="education[]" value="ME"<?php  if(in_array("ME", $explod_education)){echo"checked";} ?>>ME
						<input type="checkbox" name="education[]" value="MSC"<?php  if(in_array("MSC",$explod_education)){echo"checked";} ?>>MSC
						<input type="checkbox" name="education[]" value="Phd"<?php  if(in_array("Phd",$explod_education)){echo"checked";} ?>>Phd<br>
						
						<label for="username">Username:</label>
						<input type="text" id="username" name="username" class="user"value="<?php echo $row['username']; ?>">
						<small class="errorinusrnam" style="color:red;"></small><br>
						
						<label for="email">Email:</label>
						<input type="text" id="email" name="email" class="e_mail" value="<?php echo $row['email']; ?>">
						<small class="errorinmail" style="color:red;"></small><br>
						
						<label for="number">Mobile Number;</label>
						<input type="text" id="number" name="number" class="mobile_num" value="<?php echo $row['number']; ?>"><br>
						<small class="errorinnumber" style="color:red;"></small><br>
						
						<label for="image">Image:</label>
						<input type="file" id="uploadfile" name="uploadfile[]" multiple accept="image/*"><br>
						
						<?php
							$for=$row["uploadfile"];
							$expl=explode(" , " , $for);
							
							foreach($expl as $abc){
							?>
							<img src= "images/<?php echo $abc; ?>" width=100 height=100 >
							
							<?php     
							}
							
						?>
						
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
									{?>
									<option value=' <?php echo $value["id"]; ?>' <?php if($value["id"] == $row['country_name']){echo "selected";} ?>><?php echo $value["country_name"]; ?></option>;
									<?php
									}
								?>
								<!-- echo '<option value='.$value["id"].'>'.$value["country"].'</option>'; -->
							</select>
						</div>
						
						<div class="name">
							<label for="state">State:</label>
							<?php
								$sel_qu="SELECT * FROM states";
								$dist=mysqli_query($conn,$sel_qu) or die(mysqli_error($conn));
							?>
							<select name="state_name" id="state">
								<option value=''>select state</option>
								<?php 
									foreach ($dist as $value2) 
									{
									?>
									<option value=' <?php echo $value2["id"]; ?>' <?php if($value2["id"] == $row['state_name']){echo "selected";} ?>><?php echo $value2["statename"]; ?></option>;
									<?php
									}
								?>
								<!-- echo '<option value='.$value2["sid"].'>'.$value2["state"].'</option>'; -->
							</select>
						</div>
						
						<br>
						<div class="name">
							<label for="city">City:</label>
							<?php
								$sel_qu="SELECT * FROM cities";
								$dist=mysqli_query($conn,$sel_qu) or die(mysqli_error($conn));
							?>
							<select name="city_name" id="city">
								<option value=''>select city</option>
								<?php 
									foreach ($dist as $value2) 
									{
									?>
									<option value='<?php echo $value2["id"]; ?>' <?php if($value2["id"] == $row['city_name']){echo "selected";} ?>><?php echo $value2["cityname"]; ?></option>;
									<?php
									}
								?>                            
								<!-- echo '<option value='.$value2["cid"].'>'.$value2["city"].'</option>'; -->
							</select>
						</div>
						
						<br><br><input type="submit" name="update" value="update">
						
						<input type="button" name="table"  value="back to table" onclick='window.location.href="view_old.php"'/>
						
						
					</form>
				</div>
				
			</body>
		</html>
		<?php     
		}
	}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
	$(document).ready(function() {
		$("#Registration_Form").validate({
			
			rules: {
				firstname: 'required',
				lastname: 'required',
				gender: {
					required: true
				},
				username: {
					required: true
				},
				email: {
					type: "post",
					remote:"checkemailjquery.php",
					required: true,
					email: true,//add an email rule that will ensure the value entered is valid email id.
					maxlength: 55,
				},
				number: {
					required: true,
					number:true,
					minlength:10, 
					maxlength:10,
				},
				Password: "required",
				Conform_Password: {
					minlength:10,    
					equalTo: "#Password"
				},
				//Password : {
                // minlength : 5
				// },
				// Conform_Password : {
                // minlength : 5,
                // equalTo : '[name="Password"]'
				// },
				country: {
					required: true,
				},
				state: {
					required: true,
				},
				city: {
					required: true,
				},
			},
			messages: {
				firstname: 'This field is required',
				lastname: 'This field is required',
				email: 'Enter a valid email'
				
			},
			submitHandler: function(form) {
				form.insert()
			}
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() 
	{
		$('#country').on('change',function ()
		{
			var countryid = $(this).val();
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
		
		$('#state').on('change',function ()
		{
			var stateid = $(this).val();
			$.ajax
			({
				method:'POST',
				url:'country_state_listajax.php',
				data:{state_id:stateid},
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
