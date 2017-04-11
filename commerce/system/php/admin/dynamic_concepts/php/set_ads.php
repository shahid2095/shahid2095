<?php

include "connection.php";
  $page = $_GET['page'];
  if($_GET['switch'] == "on")
  {
    
    $switch1 ="off";
   
    $sql="UPDATE `advertisment` SET `switch` = '".$switch1."' WHERE `page` = '".$page."'";
   $query = mysqli_query($conn,$sql);
  }
   if($_GET['switch'] == "off")
  {

    $switch1 ="on";
    $sql="UPDATE `advertisment` SET `switch` = '".$switch1."' WHERE `page` = '".$page."'";
   $query = mysqli_query($conn,$sql);
  }

 header("location:../ads.php");

?>