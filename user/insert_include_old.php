<?php 
include "config.php";

if (isset($_POST['insert']))
{  print_r($_POST);
	echo"hello";
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $username=$_POST['username'];
  $gender=$_POST['gender'];
  $edu=$_POST['education'];
  $education=implode(" , " , (array)$edu);
  $email=$_POST['email'];
  $number=$_POST['number'];
  $country=$_POST['country_name'];
  $state=$_POST['state_name'];
  $city=$_POST['city_name'];
  $Password=$_POST['Password'];
  $Conform_Password=$_POST['Conform_Password']; 
  

  		$ins="INSERT INTO users (firstname,lastname,gender,education,username,email,number,country_name,state_name,city_name,Password,Conform_Password) VALUES('$firstname','$lastname','$gender','$education','$username','$email','$number','$country','$state','$city','$Password','$Conform_Password')";

     		echo "$ins";
        	$ival=mysqli_query($conn,$ins);
        	if($ival) 	
        	 {        
        	 echo "data inserted in table";
        	 }
        	else
       	 	 {
        	 echo "error in insert data";
        	    }
    
  
}
?>
