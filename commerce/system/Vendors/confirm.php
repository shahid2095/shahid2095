<?php
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
$email = $_POST['email'];
$fn = $_POST['first_name'];
$ln = $_POST['last_name'];
$dn = $_POST['display_name'];
$number = $_POST['mobile'];
$pin = $_POST['pincode'];
$address = $_POST['address'];
$state = $_POST['state'];
$email = $_POST['email'];
$pw = $_POST['password'];
$active = 0;
$conf = 0;

$sql = "INSERT INTO `Pending_vendors`(`fn`, `ln`, `phone`, `address`, `state`, `email`, `pword`, `active`, `email_confirm`, `pin`) VALUES ('".$fn."','".$ln."','".$number."','".$address."','".$state."','".$email."','".$pw."','".$active."','".$conf."','".$pin."')";

mysqli_query($conn,$sql);




?>








<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="/commerce/system/css/custom/view_products.css">
<link rel="stylesheet" href="/commerce/system/css/custom/megamenu.css">
<link rel="stylesheet" href="/commerce/system/css/custom/signup.css">
<link rel="stylesheet" href="/commerce/system/css/custom/luminous_buttons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>


                                                        
                            
	<div class="container" style="z-index: -1;">

<div class="row" id="form">





<h3><span style="margin:20px;padding-left: 10px;"> Confirm your Email <?php echo $_POST['email'];?></span><br>

<span style="margin:20px;padding-left: 10px;"> <a href="../../vlogin.php">Go to Login Page</a></span></h3>




</div><!-- /.modal -->
</div>
	<script type="text/javascript"></script>

                        


</body>
</html>