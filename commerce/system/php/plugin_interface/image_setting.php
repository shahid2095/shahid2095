<?php

$width = $_GET['width'];
$height = $_GET['height'];
$type = $_GET['type'];
$form = $_GET['submit'];

echo $form;

include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";

if($width!="" && $height!="")
{
$image_query = mysqli_query($conn, "UPDATE `image_mag` SET `width`=".$width.",`height`=".$height.",`type`='".$type."' WHERE name = '".$form."'");
}

if($width!="" && $height=="")
{
$image_query = mysqli_query($conn, "UPDATE `image_mag` SET `width`=".$width.",`type`='".$type."' WHERE name = '".$form."'");

}
if($width=="" && $height!="")
{
$image_query = mysqli_query($conn, "UPDATE `image_mag` SET `height`=".$height.",`type`='".$type."' WHERE name = '".$form."'");
}

if($width=="" && $height=="")
{
$image_query = mysqli_query($conn, "UPDATE `image_mag` SET `type`='".$type."' WHERE name = '".$form."'");
}









header("location:../image_mag.php");
?>