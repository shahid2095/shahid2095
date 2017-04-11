<?php


include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";


$get_product = "SELECT * FROM `advertisment` WHERE `page` ='home' ";
$get_query = mysqli_query($conn,$get_product);
$get_result = mysqli_fetch_assoc($get_query);


?>
<form>

<button name="submit"><?php echo $get_result['switch'];?></button>


</form>

<?php

if(isset($_GET['submit']))
{
  if($get_result['switch'] == "on")
  {
    $switch1 ="off";
   
    $sql="UPDATE `advertisment` SET `switch` = '".$switch1."' WHERE `page` = 'home'";
   $query = mysqli_query($conn,$sql);
  }
   if($get_result['switch'] == "off")
  {
    $switch1 ="on";
    $sql="UPDATE `advertisment` SET `switch` = '".$switch1."' WHERE `page` = 'home'";
   $query = mysqli_query($conn,$sql);
  }

 }

?>