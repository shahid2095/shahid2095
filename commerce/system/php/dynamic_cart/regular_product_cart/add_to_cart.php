<?php
 include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";

$id = $_GET['id'];
$customerid = 1;
$unit = 1;




  $sql="SELECT * FROM `cart` WHERE productid = ".$id."";
  $query = mysqli_query($conn,$sql);

  $row_cnt = mysqli_num_rows($query);

  $quantity_query="SELECT quantity FROM `cart` WHERE productid = ".$id."";

  $query_perform = mysqli_query($conn,$quantity_query);

  $single = mysqli_fetch_assoc($query_perform);



  if( $single['quantity']==null)
  {
  	 $single['quantity'] = 0;
  }
  else
  {
  	 $quantity = $single['quantity']+1;
  }



 
  $cnt = mysqli_num_rows($query);
      if($cnt>=1)
      {
      		$update = "UPDATE `cart` SET `quantity` = ".$quantity." WHERE productid = ".$id.""; 
      		mysqli_query($conn,$update);
   	 	
   	  }
   	  else
   	  {
   	  	$query = "INSERT INTO `cart` (`productid`, `quantity`, `customerid`) VALUES ('".$id."','".$customerid."','".$quantity."')";
   	  	mysqli_query($conn,$query);
   	  }





?>