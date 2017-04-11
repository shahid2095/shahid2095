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

<div class="row">
<div class="col-md-1">
  
</div>

<div class="col-md-10">

<div class="row">

<div class="col-md-2">



<form action="" method="get">
 <h3> Number of Order's to Show</h3>  <select name="limit">
 <option value="5">5</option>
    <option value="10">10</option>
    <option value="20">20</option>
    <option value="30">30</option>
    <option value="50">50</option>
    <option value="100">100</option>
    <option value="200">200</option>
    <option value="500">500</option>
    <option value="1000">1000</option>
    <option value="18446744073709551615">All</option>
  </select>
  <input type="hidden" name="offset" value="0">
  <input type="submit" name="submit" value="update">
</form>
</div>
<div class="col-md-10">

<div class="row">

<form action="" method="get">


<div class="col-md-8">

  <input type="text" class="form-control" name="searchkey" placeholder="Search Order's...">

</div>
<div class="col-md-1">

<input type="hidden" name="status" value="search">
  <button type="submit" class="btn btn-warning" style="padding: 8px;">
      <span class="glyphicon glyphicon-search"></span>
    </button>
  

  </div>

<div class="col-md-3"></div>

</form>
</div>


</div>
</div>
<div class="table-responsive">
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Order id</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th> Supplier id</th>
        <th>Order Type</th>
        <th>Unit price</th>
        <th>Payment Type</th>
        <th>Paid</th>
        <th>Status</th>
        <th>Shipping Date</th>
        <th>Sale's Tax</th>
        <th>Shipping Cost</th>
        <th>Unit price</th>
        
      </tr>
    </thead>
    <tbody>
     


<?php

$limit = $_GET['limit'];
$offset = $_GET['offset'];




$product = "SELECT * FROM `orders` WHERE `status` = 'pending' LIMIT ".$limit." OFFSET ".$offset."";
$query = mysqli_query($conn,$product);



if($query)
{

while($result = mysqli_fetch_assoc($query))
{



$supplier = "SELECT `companyname` FROM `suppliers` WHERE supplierid = ".$result['supplierid']."";
$supplier_name = mysqli_query($conn,$supplier);
$query_supplier_name = mysqli_fetch_assoc($supplier_name);



?>

   <tr>
        <td><?php echo $result['orderid'];?></td><a href=""></a>
        <td><a href="../product-desc.php?id=<?php echo $result['customerid'];?>">
        <img src="../../../../<?php echo $result['picture'];?>" width="50px" height=50px;></a></td>
        <td><?php echo $result['ordernumber'];?></td>
        <td><?php echo $query_supplier_name['companyname'];?></td>
      
      </tr>
<?php 
     

}


     }

?>

   </tbody>
  </table>
</div>


<ul class="pagination">

</ul>
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
<div class="col-md-12 row">
<div class="col-md-1">
 <p><img style="width:100px;height:100px;" src="<?php echo $result['picture'];?>">
 </div><div class="col-md-2">
 <span style="font-size:18px;">
<a href="product-desc.php?id=<?php echo $result['productid'];?>"><?php echo $result['productname'];?></a></span><br>
<span style="color:gray;">by  <?php echo $query_supplier_name['companyname'];?></span></p>
<span style="color:#ff5c33;font-weight:bold;font-size:16px;"><br><i class="fa fa-inr" ></i><?php echo "  ".$result['unitprice'];?></span><br><br><br>
 </div>
<div class="col-md-8"></div>


</div>


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