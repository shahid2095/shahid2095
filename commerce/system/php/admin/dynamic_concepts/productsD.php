<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="/commerce/system/css/custom/luminous_buttons.css">
<link rel="stylesheet" href="/commerce/system/css/custom/pagination.css">
<link rel="stylesheet" href="/commerce/system/css/custom/adminstyle.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <style type="text/css">
tr
{
  box-shadow:0px 0px 2px #808080;
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

input[type='text']
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
<body>
<?php include "admin_header.php";?>
<div class="container-fluid">
<div id="content">
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
$start=0;
$limit=10;

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $start=($id-1)*$limit;
}
else{
    $id=1;
}
//Fetch from database first 10 items which is its limit. For that when page open you can see first 10 items. 
$query=mysqli_query($conn,"select * from products LIMIT ".$start.", ".$limit."");
?>
<ul>
<div class="row">

    <div class="col-md-12">
        <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
         <th>Picture</th>
        <th>Sku</th>
        <th>  Product name</th>
        <th>  Supplier id</th>
        <th>Category id</th>
        <th>Quantity per unit</th>
        <th>Unit price</th>
        <th>  Msrp</th>
        <th>Size</th>
        <th>Colors</th>
        <th>Discount</th>
        <th>Units in Stock</th>
        <th>  Units on Order</th>
        <th>  Product available</th>
        <th>  Discount available</th>
       
        <th>  Ranking</th>
        <th>  Min_time</th>
      </tr>
    </thead>
    <tbody>
<?php
//print 10 items
while($result=mysqli_fetch_array($query))
{
    $supplier = "SELECT `companyname` FROM `suppliers` WHERE supplierid = ".$result['supplierid']."";
$supplier_name = mysqli_query($conn,$supplier);
$query_supplier_name = mysqli_fetch_assoc($supplier_name);


$product_count = "SELECT `productname` FROM `products` ";
$query_count_product = mysqli_query($conn,$product_count);
$count_product = mysqli_num_rows($query_count_product);
?>
     <tr>
       
        <td><a href="../../../../description.php?id=<?php echo $result['productid'];?>"><img src="../../../../<?php echo $result['picture'];?>" width="50px" height=50px;></a></td>
        <td><?php echo $result['sku'];?></td>
        <td><a href="../../../../description.php?id=<?php echo $result['productid'];?>"><?php echo $result['productname'];?></a></td>
        <td><?php echo $query_supplier_name['companyname'];?></td>
        <td><?php echo $result['categoryid'];?></td>
        <td><?php echo $result['quantityperunit'];?></td>
        <td><?php echo $result['unitprice'];?></td>
        <td><?php echo $result['msrp'];?></td>
        <td><?php echo $result['size'];?></td>
        <td><?php echo $result['colors'];?></td>
        <td><?php echo $result['discount'];?></td>
        <td><?php echo $result['unitsinstock'];?></td>
        <td><?php echo $result['unitsonorder'];?></td>
        <td><?php echo $result['productavailable'];?></td>
        <td><?php echo $result['discountavailable'];?></td>
        <td><?php echo $result['ranking'];?></td>
        <td><?php echo $result['min_time']."  Days";?></td>
      </tr>
<?php
}
?>
   </tbody>
  </table>
</div>
</div>

</div>
</ul>
<?php
//fetch all the data from database.
$rows=mysqli_num_rows(mysqli_query($conn,"select * from products"));
//calculate total page number for the given table in the database 
$total=ceil($rows/$limit);?>
<ul class='page'>
<?php if($id>1)
{
    //Go to previous page to show previous 10 items. If its in page 1 then it is inactive
    echo "<a href='?id=".($id-1)."' ><li class='button blue-grade'>PREVIOUS</li></a>";
}
if($id!=$total)
{
    ////Go to previous page to show next 10 items.
    echo "<a href='?id=".($id+1)."' ><li class='button blue-grade'>NEXT</li></a>";
}
?>

<?php
//show all the page link with page number. When click on these numbers go to particular page. 
        for($i=1;$i<=$total;$i++)
        {
            if($i==$id) { echo "<li class='current yellow-grade'>".$i."</li>"; }
            
            else { echo "<a href='?id=".$i." '><li class='blue-grade'>".$i."</li></a>"; }
        }
?>
    </div>
    <div class="col-md-1">
        
    </div>
</div>

</ul>
</div>
</div>
</body>
</html>


