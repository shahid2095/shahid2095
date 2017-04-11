<html >
<head>
<title>Ecommerce</title>

<?php include "header_links.php";?>

<link rel="stylesheet" href="/commerce/system/css/custom/luminous_buttons.css">
<style type="text/css">
  #msg{

    box-shadow: 0px 0px 1px green;
    padding:10px;
    margin: 5px;
    font-weight: bold;


  }

select ,input[type='text'],textarea
{
  box-shadow:0px 0px 2px #808080;
  padding:6px;
  margin: 5px;
  width: 100%;
  background:linear-gradient(#ffffff,#f2f2f2);
  border-style: solid;
  border-width: thin;
}
textarea
{
  width: 100%;

}
</style>
<script type="text/javascript">
  $("document").ready(function(){
    $("#msg").delay(5000).hide('fast');
  });
</script>
</head>

<body >
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";?>
<?php include "admin_header.php";?>


<div class="row ">


<div class="col-md-12">

<?php
if(isset($_GET['msg']))
{
echo "<span id='msg'>".$_GET['msg']."</span>";
}
?>
<h2>Add New Product </h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Simple Product</a></li>
    <li><a data-toggle="tab" href="#menu1">Link Product</a></li>
    <li><a data-toggle="tab" href="#menu2">Upload Images</a></li>
    <li><a data-toggle="tab" href="#home2">Landing Page</a></li>
 
  </ul>

<div id="product-insert">

<form  action="insert-product.php" method='POST' enctype='multipart/form-data'>


  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Insert A New Product</h3>

      <div class="row"><div class="col-md-6">

   
  <input type="text" name="productname" placeholder="Product name" ><br>

    <input type="text" name="sku" placeholder="Sku" ><br>

  <input type="text" name="supplierid" placeholder="Supplier id"><br>

<h5>Main Category</h5><select name="categoryid" ><option value="">General</option>
  <?php
    
      $sql="SELECT `catagory_id`,`catagory_name`,`description` FROM `catagory`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {?>
          <option value="<?php echo $result['catagory_id'];?>"><?php echo $result['catagory_name'];?></option>
          
        <?php
      }
      }

     ?>
</select>
<h5>Second Category</h5><select name="categoryid" ><option value="">General</option>
  <?php
    
      $sql="SELECT `catagory_id`,`catagory_name`,`description` FROM `catagory`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {?>
          <option value="<?php echo $result['catagory_id'];?>"><?php echo $result['catagory_name'];?></option>
          
        <?php
      }
      }

     ?>
</select>
<h5>Third Category</h5><select name="categoryid" ><option value="">General</option>
  <?php
    
      $sql="SELECT `catagory_id`,`catagory_name`,`description` FROM `catagory`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {?>
          <option value="<?php echo $result['catagory_id'];?>"><?php echo $result['catagory_name'];?></option>
          
        <?php
      }
      }

     ?>
</select>
  <input type="text" name="quantityperunit" placeholder="Quantity per unit"><br>

  <input type="text" name="unitprice" placeholder="Unit price"><br>

  <input type="text" name="msrp" placeholder="Msrp"><br>

  <input type="text" name="size" placeholder="Size"><br>

  <input type="text" name="color" placeholder="Color"><br>

<input type="text" name="discount" placeholder="Discount"><br>

</div>
<div class="col-md-6">

  <input type="text" name="unitweight" placeholder="Unit Weight"><br>

  <input type="text" name="unitsinstock" placeholder="Units in stock"><br>

<input type="text" name="type" placeholder="Type 'wholesale' for wholesale products"><br>

  <input type="text" name="unitsonorder" placeholder="Units on order"><br>

  <input type="text" name="productavailable" placeholder="product available"><br>

  <input type="text" name="discountavailable" placeholder="Discount Available"><br>

  <input type="text" name="min_time" placeholder="Min Time to Deliver"><br>

  <input type="text" name="max_time" placeholder="Max Time to Deliver"><br>

<input type="text" name="note" placeholder="A note on product"><br>

  <textarea name="description" placeholder=" Give description about your product" ></textarea><br>
</div>

  </div>
    </div>





    <div id="menu1" class="tab-pane fade">
   
       


    </div>


    <div id="menu2" class="tab-pane fade">
      <h3>Upload Images of New Product</h3>
    
<input type='file'  name='fileToUpload'><br>


    </div>


    
  </div>


<input type="submit" value="submit" class="yellow-grade">

</form>

</div>
</div>








</div>

<hr>
<div style="margin:50px;">
<ul class="nav nav-tabs" >
  <li class="active"><a data-toggle="tab" href="#product-image">Insert Images of existing products</a></li>

</ul>

<div class="tab-content">
  <div id="product-image" class="tab-pane fade in active">
    <h3>Select Images</h3>
    <div class="row">
    <form  action="insert-product.php" method='POST' enctype='multipart/form-data'>
      <div class="col-md-3">
              <input type="file" name="multi[]" >
      </div>
          </form>
      <div class="col-md-3">
       



              <form action="" method="get">
    <select  name="id">
                        <?php
                   $yah=mysqli_query($conn,"SELECT * FROM `products`");
                       if($yah)
                            {
             while($show=mysqli_fetch_assoc($yah))
                              {
                ?>
                <option value="<?php echo $show['productid']?>" class="product-value"><?php echo $show['productname']?></option>
                <?php
                        }
                    }
                                   
            ?>
                    </select>
                    <input type="submit" name="submit" value="Go" class="round-default">
              </form>


      
      </div>
      <div class="col-md-6" >
        <div id="gallery">
          

<?php

if(isset($_GET['id']))
{
$id = $_GET['id'];

  $sql="SELECT * FROM `products` WHERE productid = ".$id."";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($query);
    ?>
        <h4>Main Image</h4>
        <img src="../../../../<?php echo $result['small'];?> "> 
        
<?php

     $product_count = "SELECT * FROM `media_sm` WHERE productid = ".$id."";
     if($query_count_product = mysqli_query($conn,$product_count))
     {
        while($count_product = mysqli_fetch_assoc($query_count_product))
        {
     
?>

<?php
        }
    }

}

?>


        </div>
      </div>
      
   
    </div>
    

   
  </div>

</div>
</div>





</body>
</html>