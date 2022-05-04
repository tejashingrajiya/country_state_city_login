
<?php
include ('config.php');

if(isset($_POST['update'])){
        
  $id = $_GET['id'];
  $firstname=$_POST['firstname'];
  #$course=$_POST['course'];
  $lastname=$_POST['lastname'];
  $username=$_POST['username'];
  $gender=$_POST['gender'];
  @$education=implode(" , " ,$_POST['education']);
  $email =$_POST['email'];
  $number = $_POST['number'];
  $country=$_POST['country'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $edu=$_POST['education'];
    //print_r($edu); 

    if($_FILES["uploadfile"] == ""){
		
        $mail_queryemail="SELECT * FROM tbl2 WHERE  email= '$email' ";
   $runmail=mysqli_query($conn, $mail_queryemail);
   
   $nu_querynumber="SELECT * FROM tbl2 WHERE  number= '$number'";
   $runnumber=mysqli_query($conn, $nu_querynumber);
   
   
   if( mysqli_num_rows ($runmail)>= 2 or mysqli_num_rows ($runnumber)>= 2)
   { 

    
   
    if(mysqli_num_rows ($runmail)>= 2)
   {
      echo "mail exist..";?> <br><br><?php
   }
   

   if(mysqli_num_rows ($runnumber)>= 2)
   {
    echo "number exist..";
   }
 }

else{
    $stat = "UPDATE tbl2 SET firstname='$firstname',lastname='$lastname',gender='$gender' ,education='$education', username='$username',email='$email',number='$email',country='$country',state='$state',city='$city' WHERE id = '$id'";
        $updt = mysqli_query($conn,$stat) or die("Failed Update.". mysqli_error($conn));
        if($updt)

        {
        echo "data Updated.";

        }else{
          echo "Failed Updated.";
        }
    }
    }else
    {
        $filename = $_FILES["uploadfile"]["name"];
        $img_name = implode(" , " , $filename);
        $tempname = $_FILES["uploadfile"]["tmp_name"];    
     
        foreach($filename as $key=>$val){
        move_uploaded_file($tempname [$key],'images/'.$val);
       }
       
       $mail_queryemail="SELECT * FROM tbl2 WHERE  email= '$email' ";
       $runmail=mysqli_query($conn, $mail_queryemail);
       
       $nu_querynumber="SELECT * FROM tbl2 WHERE  number= '$number'";
       $runnumber=mysqli_query($conn, $nu_querynumber);
       
       
       if( mysqli_num_rows ($runmail)>= 2 or mysqli_num_rows ($runnumber)>= 2)
       { 
        
   
            if(mysqli_num_rows ($runmail)>= 2)
            {
              echo "mail exist..";?> <br><br><?php
            }
           
           
           if(mysqli_num_rows ($runnumber)>= 2)
           {
            echo "number exist..";
           }
       }else{

            $stat = "UPDATE tbl2 SET firstname='$firstname',lastname='$lastname',gender='$gender' ,education='$education',username='$username',email='$email',number='$number',image='$img_name',country='$country',state='$state',city='$city' WHERE id = '$id'";
            $updt = mysqli_query($conn,$stat) or die("Failed Update.". mysqli_error($conn));
            if($updt)
            {
                header('location: http:view.php');
            }else{
              echo "Failed Updated.";
            }
        }
    }

}
?>