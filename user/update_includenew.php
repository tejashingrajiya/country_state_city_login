<?php

if(isset($_POST['update'])){
        
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $firstname=$_POST['firstname'];
  #$course=$_POST['course'];
  $lastname=$_POST['lastname'];
  $username=$_POST['username'];
  $gender=$_POST['gender'];
  $edu=$_POST['education'];
  $educations=implode(" , " , (array)$edu);
  $email =$_POST['email'];
  $number = $_POST['number'];
  $country=$_POST['country_name'];
  $state=$_POST['state_name'];
  $city=$_POST['city_name'];
  print_r($educations);
    $img =$_FILES['uploadfile']['name'];
	$img_name = implode(" , " , $img);

    $stat = "UPDATE users SET firstname='$firstname',lastname='$lastname',gender='$gender' ,education='$educations',username='$username',email='$email',number='$number',country_name='$country',state_name='$state',city_name='$city',uploadfile='$img_name' WHERE id = '$id'";
            $updt = mysqli_query($conn,$stat) or die("Failed Update.". mysqli_error($conn));
            if($updt)
            {   

                echo "ok";
            }else{
              echo "Failed Updated.";
            }
        }
?>