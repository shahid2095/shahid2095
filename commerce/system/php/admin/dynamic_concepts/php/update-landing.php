<?php
include "connection.php";
if(isset($_GET['create'])){
$_time = $_GET['_time'];
$catagories  = $_GET['categoryid'];
$_limit  = $_GET['_limit'];
$visible  = $_GET['visible'];
$width  = $_GET['width'];
$height = $_GET['height'];
$autoplay = $_GET['autoplay']


$query = "UPDATE `_control` SET `_time`='".$_time."',`catagories`='".$catagories."',`_limit`='".$_limit."',`visible`='".$visible."',`width`='".$width."',`height`='".$height."',`autoplay`='".$autoplay."' WHERE 1";


if(mysqli_query($conn,$query))
{
  echo "Success";

}
else
{
echo("Error description: " . mysqli_error($conn));
}

header("Location: ../landing-control.php?status=Success");

}
else
{
    echo "_CONTROL NOT CREATED";
}
?>