<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="system/js/jquery.countdown.min.js"></script>
 <link href="system/css/custom/megamenu.css" rel="stylesheet">
    <link href="system/css/custom/luminous_buttons.css" rel="stylesheet">
</head>
<body>
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";?>

<?php

$name = "";

$product = "SELECT * FROM `products` WHERE productname LIKE '%".$name."%'";
$query = mysqli_query($conn,$product);



if($query)
{
  $i=1;

while($result = mysqli_fetch_assoc($query))
{



$supplier = "SELECT `companyname` FROM `suppliers` WHERE supplierid = ".$result['supplierid']."";
$supplier_name = mysqli_query($conn,$supplier);
$query_supplier_name = mysqli_fetch_assoc($supplier_name);


$product_count = "SELECT `productname` FROM `products` WHERE supplierid = ".$result['supplierid']."";
$query_count_product = mysqli_query($conn,$product_count);
$count_product = mysqli_num_rows($query_count_product);


              $unitprice = $result['unitprice'];
              $discountprice = $result['discount'];

              $priceoff = $unitprice - $discountprice;

              if($priceoff >= 1)
              {

              $percent = ($priceoff/$unitprice)*100;


              echo "<span class='tag2 hot'>".round($percent)."%</span>";
              }


              ?>

<?php echo $result['productname'];?> <input type="checkbox" name="" value="<?php echo $result['productid'];?>"><br>


<?php 

}

}


?>


</body>
</html>