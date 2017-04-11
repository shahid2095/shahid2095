<?php
include "connection.php";
if(isset($_GET['create'])){
$_time = $_GET['_time'];
$catagories  = $_GET['categoryid'];
$_limit  = $_GET['_limit'];
$width  = $_GET['width'];
$height = $_GET['height'];


$query = "INSERT INTO `_side_b`(`_time`, `catagories`, `_limit`, `width`, `height`) VALUES ('".$_time."',
'".$catagories."',
'".$_limit."',

'".$width."',
'".$height."')";

if(mysqli_query($conn,$query))
{
  echo "Success";

}
else
{
echo("Error description: " . mysqli_error($conn));
}

header("Location: ../product-input.html?status=Success");

}
else
{
    echo "_CONTROL NOT CREATED";
}
?>