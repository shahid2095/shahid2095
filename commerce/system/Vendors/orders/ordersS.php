<html >
<head>
<title>Ecommerce</title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300' rel='stylesheet' type='text/css'>
    <style type="text/css">
tr
{
  box-shadow:0px 0px 1px #808080;
  padding:5px;
  background:linear-gradient(#ffffff,#f2f2f2);
}
tr th
{
   background:linear-gradient(#ffffff,#f2f2f2,#e6e6e6,#bfbfbf);

}
tr th thead
{
  padding:10px;
}
select ,input[type='text']
{
  box-shadow:0px 0px 1px #808080;
  padding:6px;
  margin-bottom: 2px;
  width: 100%;
  background:linear-gradient(#ffffff,#f2f2f2);
  border-style: solid;
  border-width: thin;
}
    </style>
</head>

<body >
<?php  include "vendor_header.php";?>

<form action="" method="get">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="row">
  <div class="col-md-8">
    <input type="text" class="form-control" name="searchkey" placeholder="Search Order's...">
  </div>
  <div class="col-md-4">
  <div class="row">
    <div class="col-md-9">
      <select>
    <option>Order Id</option>
    <option>Vendor id</option>
    </select>
    </div>
    <div class="col-md-3">
      <input type="hidden" name="status" value="search">
  <button type="submit" class="btn btn-warning" style="padding: 12px;">
      <span class="glyphicon glyphicon-search"></span>
    </button>
    </div>
  </div>
      

  </div>
</div>

</div>
<div class="col-md-1">


  

  </div>

<div class="col-md-3"></div>
</div>

</form>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">


<?php


if(isset($_GET['searchkey']))
{

include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
$searchstring=$_GET['searchkey'];






$product = "SELECT * FROM `products` WHERE productname LIKE '%".$_GET['searchkey']."%'";
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

<div class="row">




</div>

<?php 

        }

     }
}
?>






</div>

<div class="col-md-1"></div>
</div>

 
</body>
</html>