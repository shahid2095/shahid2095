<?php


if(isset($_GET['searchkey']))
{

 include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";

$searchstring=$_GET['searchkey'];






$product = "SELECT * FROM `products` WHERE productname LIKE '".$_GET['searchkey']."%' LIMIT 7 ";
$query = mysqli_query($conn,$product);



if($query)
{

while($result = mysqli_fetch_assoc($query))
{



$supplier = "SELECT `companyname` FROM `suppliers` WHERE supplierid = ".$result['supplierid']."";
$supplier_name = mysqli_query($conn,$supplier);
$query_supplier_name = mysqli_fetch_assoc($supplier_name);


$product_count = "SELECT `productname` FROM `products` WHERE supplierid = ".$result['supplierid']."";
$query_count_product = mysqli_query($conn,$product_count);
$count_product = mysqli_num_rows($query_count_product);


?>

<div id="result">
<a href="product-desc.php?id=<?php echo $result['productid'];?>" style="font-weight:bold;padding: 50px;"><span style="font-size: 18px;"><?php echo $result['productname'];?></span> in category Electronic</a></span><br>
 
</div>




<?php 
     

}


     }

}



?>
