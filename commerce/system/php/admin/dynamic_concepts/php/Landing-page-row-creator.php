<?php
include "connection.php";

$_time = $_GET['_time'];
$catagories  = $_GET['categoryid'];
$_limit  = $_GET['_limit'];
$visible  = $_GET['visible'];
$width  = $_GET['width'];
$height = $_GET['height'];
$autoplay = $_GET['autoplay'];
$heading = $_GET['heading'];
$query = "INSERT INTO `_control`(`_time`, `catagories`, `_limit`, `visible`, `width`, `height`, `autoplay`, `heading`) VALUES ('".$_time."','".$catagories."','".$_limit."','".$visible."','".$width."','".$height."','".$autoplay."','".$heading."')";

if(mysqli_query($conn,$query))
{
  echo "Success";

}
else
{
echo("Error description: " . mysqli_error($conn));
}

header("Location: ../landing-control.php?status=Success");

?>