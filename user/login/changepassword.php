<?php
session_start();
include "config.php";
if (!isset($_SESSION["emailid"])) {
    echo "you are logged out";
     header("Location:index.php");
    }
if(count($_POST)>0) {
$id = $_SESSION['id'];
$email=$_SESSION['emailid'];
$npass=$_POST['newPassword'];
$result = mysqli_query($conn,"SELECT * FROM tbl2 WHERE email='$email'");
$row=mysqli_fetch_assoc($result);
print_r($row);
    if($_POST["currentPassword"] == $row["Password"]) 
    {
        if($_POST["newPassword"] == $_POST["confirmPassword"])
        {
            $n_con =$_POST["confirmPassword"];
            $var="UPDATE tbl2 SET Password='$npass', Conform_Password='$n_con' WHERE email='$email'";
            $query=mysqli_query($conn, $var) or die("Failed Select." . mysqli_error($conn));
            $message = "Password Changed Sucessfully";
        }else{
             $message = "Password is not correct";
        }
    }else{
        $message = "Current Password is not Match";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Password Change</title>

</head>
<body>
<h3 align="center">CHANGE PASSWORD</h3>
<div><?php if(isset($message)) { echo $message; } ?></div>
<form method="post" action="" align="center">
Current Password:<br>
<input type="password" name="currentPassword"><span id="currentPassword" class="required"></span>
<br>
New Password:<br>
<input type="password" name="newPassword"><span id="newPassword" class="required"></span>
<br>
Confirm Password:<br>
<input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
<br><br>
<input type="submit">
</form>
<a href="wellcome.php">wellcome page</a><br>
<a href="logout.php">logout</a>
<br>
<br>
</body>
</html>
<?php
if (!isset($_SESSION['EXPIRES']) || $_SESSION['EXPIRES'] < time()+3600) {
    session_destroy();
    $_SESSION = array();
}
$_SESSION['EXPIRES'] = time() + 3600;
?>