<!DOCTYPE html>
<html>
<body>
<?php
session_start();
include "config.php";
if (!isset($_SESSION["emailid"])) {
    echo "you are logged out";
     header("Location:index.php");
    }
$id = $_SESSION['id'];
$sql = "SELECT * FROM tbl2 WHERE id='{$id}'";
$result = mysqli_query($conn,$sql) or die("quri_failed");

if (mysqli_num_rows($result)> 0){
  // output data of each row
  while($row=mysqli_fetch_assoc($result)) {
    echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br> gender:".$row["gender"]."<br> education:".$row["education"]."<br> username:".$row["username"]."<br> email:".$row["email"]."<br> number:".$row["number"]."<br> country:".$row["country"]."<br> state:".$row["state"]."<br> city:".$row["city"];
  }
} else {
  echo "0 results";
}

$conn->close();
?>

</body>
</html>
