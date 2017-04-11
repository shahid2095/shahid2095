<?php
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";

$query = "INSERT INTO `customers`(`firstname`, `lastname`, `address1`, `city`, `postalcode`, `phone`, `email`, `password`) VALUES ('".$_GET['first_name']."','".$_GET['last_name']."','".$_GET['address']."','".$_GET['city']."',".$_GET['pincode'].",".$_GET['mobile'].",'".$_GET['email']."','".$_GET['password']."')";

mysqli_query($conn,$query);

header("location:../../login.php");

?>