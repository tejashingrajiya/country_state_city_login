<?php
include "config.php";
if (isset($_POST))
{ 	print_r($_POST);
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $gender=$_POST['gender'];
  $edu=implode(" , " , $_POST['education']);
  print_r($edu);
  $username=$_POST['username'];
  $email=$_POST['email'];
  $number=$_POST['number'];
  $Password=$_POST['Password'];
  $Conform_Password=$_POST['Conform_Password'];
  $country_name=$_POST['country_name'];
  $state_name=$_POST['state_name'];
  $city_name=$_POST['city_name'];
  //image
  //$filename=$_FILES["uploadfile"];
  if($_FILES['uploadfile']['name']){
 
    move_uploaded_file($_FILES['uploadfile']['tmp_name'], "images/".$_FILES['uploadfile']['name']);
 
    $img =$_FILES['uploadfile']['name'];
 
    }
  
  		$ins="INSERT INTO users (firstname,lastname,gender,education,username,email,number,Password,Conform_Password,country_name,state_name,city_name,uploadfile) VALUES('$firstname','$lastname','$gender','$edu','$username','$email','$number','$Password','$Conform_Password','$country_name','$state_name','$city_name','$img')";
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
