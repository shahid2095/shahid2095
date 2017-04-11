<?php
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
$id = $_GET['id'];






  $sql="SELECT * FROM `food_cart` WHERE productid = ".$id."";
  $query = mysqli_query($conn,$sql);


  $quantity_query="SELECT quantity FROM `food_cart` WHERE productid = ".$id."";
  $query_perform = mysqli_query($conn,$quantity_query);

  $single = mysqli_fetch_assoc($query_perform);


  $cnt = $single['quantity'];

      if($cnt==1)
      {
      		$product = "DELETE FROM `food_cart` WHERE productid = ".$id."";
 			if(mysqli_query($conn,$product))
 			{
 				echo "s 1";
 			}
 			else
 			{
 				echo "error 1";
 			}

   	 	
   	  }
   	  else
   	  {
   	  		 $quantity = $single['quantity']-1;
   	  	$update = "UPDATE `food_cart` SET `quantity` = ".$quantity." WHERE productid = ".$id.""; 
      		
      			if(mysqli_query($conn,$update))
 			{
 				echo "s 2";
 			}
 			else
 			{
 				echo "error 2";
 			}
   	  }














header("location:../../../../food_menu.php");







?>