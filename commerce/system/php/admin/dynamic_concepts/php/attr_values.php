<?php

include "connection.php";

$attr = $_POST['attr_value'];
$attr_value = $_POST['attribute_values'];

$sql = "INSERT INTO `attribute_values` (`attribute_id`,`value_name`) VALUES ('".$attr."','".$attr_value."')";

mysqli_query($conn,$sql);

header("location:../attributes.php");

?>