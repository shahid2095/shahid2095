<?php


include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";

$productid = $_POST['id'];
$customerid = 1;
$msg = $_POST['msg'];

$sql="INSERT INTO `comment_database`(`productid`, `customerid`, `msg`) VALUES ('".$productid."','".$customerid."','".$msg."')";

mysqli_query($conn,$sql);
header("location:../../../description.php?id=".$productid."");
?>