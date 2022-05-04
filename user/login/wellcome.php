

<?php
session_start();
include "config.php";
if (!isset($_SESSION["emailid"])) {
		echo "you are logged out";
		 header("Location:index.php");
		}

if ($_SESSION["emailid"]) {
    
     header("http://localhost/country_state_city/user/login/wellcome.php");
    }else{
      header("http://localhost/country_state_city/user/login/index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>welcome user</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <h3><?php echo $_SESSION['username']; ?></h3>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
     <li class="nav-item active">
        <a class="nav-link" href="profile.php">Home <span class="sr-only">(profile)</span></a>
     </li>
      <li class="nav-item">
        <a class="nav-link" href="updateprofile.php?id=<?php echo $_SESSION['id']; ?>">update</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="changepassword.php">change_password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="display_product_login.php">ALL PRODUCT</a>
      </li>
    </ul>
  </div>
</nav>
<h1 align="center" style="color: limegreen;"> hello <ul><?php echo $_SESSION['username']; ?></ul> Wellcome !</h1>


<!-- display product table without login -->
<!-- <a href="http://localhost/country_state_city/product/display_product.php"><input type="submit" name="product_table" value="See product"style="text-align: center;  margin-left: 650px;"></a> -->
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>