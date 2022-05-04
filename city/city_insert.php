<?php
	include "config.php";
?>
<html>
	<head>
		<!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> -->
		<title>Insert city</title>
		<script type="text/javascript">
		</script>
	</head>
	
	<body>
		
		<form  action="" method="POST" class="countryform">
			<div class="head">
				<h1>Enter city</h1>
			</div>
			
			<!-- country html -->
			<div class="name" >
				<label for="country"><h2>choose country firsts:</h2></label>
				<?php
					$sel="SELECT * FROM countries";
					$dis=mysqli_query($conn,$sel) or die(mysqli_error($conn));
				?>
				<select name="countryid" id="countery">
					<option value=''>select country</option>
					<?php 
						foreach ($dis as $value) {
							echo '<option value='.$value["id"].'>'.$value["country_name"].'</option>';
						} ?>
				</select>
			</div>
			
			<!-- state html -->
			<div class="name">
				<label for="state"><h2>choose state firsts:</h2></label>
				<select name="stateid" id="state">
				<option value=''>select state</option>
				</select>
			</div>
			
			<!-- insert city menualy -->
			<div class="name">
				<label for="city"><h2>insert city:</h2></label>
				<input type="text" id="city" name="cityname"><br><br>	
			</div>
			
			<div class="submit">
				<input type="submit"  id="submit" name="insert"  value="insert">
			</div>
		</form>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript">
			
			$(document).ready(function() {
				$('#countery').on('change',function () {
					var cntryid = $(this).val();
					//alert(cntryid);
					$.ajax({
						method:'POST',
						url:'country_state_list_ajax.php',
						data:{id2:cntryid},
						//dataType:'html',
						success:function(data){
							$('#state').html(data);
							//console.log(data);
						}
					});
					
				});
				
				
			});
		</script>
		
		
		<?php
			if(isset($_POST['insert']))
			{	print_r($_POST);
				$country=$_POST['countryid'];
				$state=$_POST['stateid'];
				$city=$_POST['cityname'];
				
				$ins_q="INSERT INTO cities (cityname,stateid,countryid) VALUES ('$city','$state','$country')";
				echo "$ins_q";
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