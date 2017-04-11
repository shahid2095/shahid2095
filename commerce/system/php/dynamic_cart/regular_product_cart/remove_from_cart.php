<?php
 include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
$id = $_GET['pid'];





  $sql="SELECT * FROM `cart` WHERE productid = ".$id."";
  $query = mysqli_query($conn,$sql);


  $quantity_query="SELECT quantity FROM `cart` WHERE productid = ".$id."";
  $query_perform = mysqli_query($conn,$quantity_query);

  $single = mysqli_fetch_assoc($query_perform);


  $cnt = $single['quantity'];


      if($cnt==1)
      {
      		$product = "DELETE FROM `cart` WHERE productid = ".$id."";
 			mysqli_query($conn,$product);
 	
   	 	
   	  }
   	  else
   	  {
   	  		 $quantity = $single['quantity']-1;
   	  	$update = "UPDATE `cart` SET `quantity` = ".$quantity." WHERE productid = ".$id.""; 
      		mysqli_query($conn,$update);

   	  }


        header("location:../../../../view_products.php?searchkey=");
           



?>