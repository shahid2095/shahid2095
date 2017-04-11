<?php


include "inc/connection.php";

$cmnt_id = $_GET['cmnt_id'];
$customerid = $_GET['customerid'];
$msg = $_GET['msg'];

$sql="INSERT INTO `sub_cmnt_database`(`cmnt_id`, `msg`, `customerid`) VALUES ('".$cmnt_id."','".$msg."','".$customerid."')";

mysqli_query($conn,$sql);

?>