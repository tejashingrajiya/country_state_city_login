<?php

if(isset($_POST['update'])){
        
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $firstname=$_POST['firstname'];
  #$course=$_POST['course'];
  $lastname=$_POST['lastname'];
  $username=$_POST['username'];
  $gender=$_POST['gender'];
  $edu=$_POST['education'];
  $education=implode(" , ", (array)$edu);
  $email =$_POST['email'];
  $number = $_POST['number'];
  $country=$_POST['country'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $filename = $_FILES["uploadfile"]["name"];
    $img_name = implode(" , " , $filename);
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    //print_r($edu); 

    $stat = "UPDATE users SET firstname='$firstname',lastname='$lastname',gender='$gender' ,education='$education',username='$username',email='$email',number='$number',image='$img_name',country='$country',state='$state',city='$city' WHERE id = '$id'";
            $updt = mysqli_query($conn,$stat) or die("Failed Update.". mysqli_error($conn));
            if($updt)
            {   

                echo "ok";
            }else{
              echo "Failed Updated.";
            }
        }
?>