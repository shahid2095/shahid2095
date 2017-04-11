<?php

include "connection.php";

$attributes = $_POST['attribute'];

$sql = "INSERT INTO `product_attributes` (`name`) VALUES ('".$attributes."')";

mysqli_query($conn,$sql);

header("location:../attributes.php");

?>