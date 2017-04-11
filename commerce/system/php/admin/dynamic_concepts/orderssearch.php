<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Control Panel</title>

  <?php include "header_links.php";?>
<link rel="stylesheet" type="text/css" href="css/custom/general.css">
<style type="text/css">
	.pagination
	{
	box-shadow: 0px 0px 1px #e67300;
	border-color:#005c99;
	padding: 5px;
	border-radius: 0px;
	font-size: 16px;
	text-decoration: none;
	font-weight: bold;
	color: black;
	background:linear-gradient(#ffffff,#fff2e6,#ffe6cc)
	}
	.pagination:hover
	{
		box-shadow: 0px 0px 5px #e67300;
		transition:all 1s;
		color: black;
	}
	.current
	{
		opacity: 0.5;
		color: red;
	}

</style>
</head>
<body>

<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";?>
<?php include "admin_header.php";?>
<div class="header">Orders New</div>
<div class="row" style="padding: 0px;margin: 0px;">
  
	<div class="col-lg-10">

<?php

if(!($_GET['limit']))
{

$start=0;
$limit=10;

}
if(isset($_GET['limit']))
{

$start=0;
$limit=$_GET['limit'];

}


if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $start=($id-1)*$limit;
}
else{
    $id=1;
}


if(isset($_GET['search']))
{
    $cust=$_GET['customerid'];
    $paid=$_GET['paid'];
    $order=$_GET['order'];

    if(!($_GET['customerid']=="") && $_GET['paid']=="" && $_GET['order']=="")
    {
    	 $state = " WHERE customerid = '".$cust."'";
    }
     if($_GET['customerid']=="" && !($_GET['paid']=="") && $_GET['order']=="")
    {
    	 $state = " WHERE customerid = '".$paid."'";
    }
     if($_GET['customerid']=="" && $_GET['paid']=="" && !($_GET['order']==""))
    {
    	 $state = " WHERE orderid = '".$order."'";
    }
	else
	{
		$state = "";
		$query=mysqli_query($conn,"select * from orders".$state." LIMIT ".$start.", ".$limit."");
	}


    $query=mysqli_query($conn,"select * from orders".$state." LIMIT ".$start.", ".$limit."");
 
}
else
{
	$state = "";
	$query=mysqli_query($conn,"select * from orders".$state." LIMIT ".$start.", ".$limit."");
}


?>
<ul class='page'>
<?php

//fetch all the data from database.
$rows=mysqli_num_rows(mysqli_query($conn,"select * from orders".$state.""));
//calculate total page number for the given table in the database 
$total=ceil($rows/$limit);?>

<?php if($id>1)
{
    //Go to previous page to show previous 10 items. If its in page 1 then it is inactive
    echo "<a href='?id=".($id-1)."&limit=".$_GET['limit']."' ><li class='pagination'>PREVIOUS</li></a>";
}

//show all the page link with page number. When click on these numbers go to particular page. 
        for($i=1;$i<=$total;$i++)
        {
            if($i==$id) { echo "<li class='pagination current'>".$i."</li>"; }
            
            else { echo "<a href='?id=".$i."&limit=".$_GET['limit']." '><li class='pagination'>".$i."</li></a>"; }
        }
if($id!=$total)
{
    ////Go to previous page to show next 10 items.
    echo "<a href='?id=".($id+1)."&limit=".$_GET['limit']."' ><li class='pagination'>NEXT</li></a>";
}



?>

</ul>

<ul>
<div class="row">

    <div class="col-md-12">
        <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
         <th>ID</th>
        <th>Status</th>
        <th>Date</th>
        <th>Customer</th>
        <th>Phone</th>
        <th>Total</th>
 
      </tr>
    </thead>
    <tbody>
<?php
//print 10 items
while($result=mysqli_fetch_assoc($query))
{
	$status = $result['status'];
	$get_customer_array= mysqli_query($conn,"select * from customers WHERE customerid = ".$result['customerid']."");
	$get_customer_info = mysqli_fetch_assoc($get_customer_array);
	$get_product_array = mysqli_query($conn,"select * from products WHERE productid = ".$result['productid']."");
	$get_product_info  = mysqli_fetch_assoc($get_product_array);




?>
     <tr>

        <td><?php echo "<a href=''>#Order ".$result['orderid']."</a>";?></td>
        <td><?php 

        if($status == "pending")
        {
        	echo "<div class='btn  btn-sm  btn-info' style='width:80%;'>".$result['status']."</div>";
        }
        else if($status == "new")
        {
        	echo "<div class='btn btn-sm  btn-success' style='width:80%;'>".$result['status']."</div>";
        }
        else if($status == "canceled")
        {
        	echo "<div class='btn  btn-sm btn-danger' style='width:80%;'>".$result['status']."</div>";
        }
         else if($status == "return")
        {
        	echo "<div class='btn btn-sm btn-warning' style='width:80%;'>".$result['status']."</div>";
        }
        





        ?></td>
        <td><?php echo $result['orderdate'];?></td>
        <td><?php echo $get_customer_info['firstname'];?></td>
        <td><?php echo $get_customer_info['email'];?></td>
        <td><?php echo $get_product_info['unitprice'];?></td>
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
<hr>
<?php

//fetch all the data from database.
$rows=mysqli_num_rows(mysqli_query($conn,"select * from orders".$state.""));
//calculate total page number for the given table in the database 
$total=ceil($rows/$limit);?>
<ul class='page'>
<?php if($id>1)
{
    //Go to previous page to show previous 10 items. If its in page 1 then it is inactive
    echo "<a href='?id=".($id-1)."&limit=".$_GET['limit']."' ><li class='pagination'>PREVIOUS</li></a>";
}

//show all the page link with page number. When click on these numbers go to particular page. 
        for($i=1;$i<=$total;$i++)
        {
            if($i==$id) { echo "<li class='pagination current'>".$i."</li>"; }
            
            else { echo "<a href='?id=".$i."&limit=".$_GET['limit']." '><li class='pagination'>".$i."</li></a>"; }
        }
if($id!=$total)
{
    ////Go to previous page to show next 10 items.
    echo "<a href='?id=".($id+1)."&limit=".$_GET['limit']."' ><li class='pagination'>NEXT</li></a>";
}
?>
	</div>
<div class="col-lg-2">

	   <div class="box-gray">
	   <div class="box-container">
	   <form>
			   <div>
			   Customer
			   	<input type="text" name="customerid">
			   	</div>
			   <div>Paid
			   	<input type="text" name="paid">
			   	</div>
			   <div>Order
			   	<input type="text" name="order">
			   	</div>
	   	<br>
	  	   Results/Page
			   	<select name="limit">
			   		<option value="2">2</option>
			   		<option value="5">5</option>
			   		<option value="10">10</option>
			   		<option value="50">50</option>
			   		<option value="100">100</option>
			   		<option value="500">500</option>
			   		<option value="1000">1000</option>
			   		<option value="9999999999999999">All</option>
			   	</select>
		<input type="hidden" name="search" value="on">	   	
	   	<input type="submit" name="submit" class="submit" value="Search">
	   </form>
	   	</div>
	   </div>



	</div>


</div>






</body>

</html>