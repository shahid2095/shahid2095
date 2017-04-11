<?php
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";

$creadit = $_GET['credit'];
$price = $_GET['price'];

	$log = "UPDATE `points` SET `points`='".$creadit."',`price_rate`='".$price."' WHERE id = 1";

	mysqli_query($conn,$log);


header("location:coupon_code.php");


?>