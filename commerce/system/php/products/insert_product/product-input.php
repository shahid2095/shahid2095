<html >
<head>
<title>Ecommerce</title>



<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<body >
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";?>
<div class="container">

<div class="row">


<div class="col-md-8">
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
  <input type="text" name="sku" placeholder="Give product a Unique id" ><br>
      
  <input type="text" name="productid" placeholder="Give product a id" ><br>
 
  <input type="text" name="productname" placeholder="Product name" ><br>

  <input type="text" name="supplierid" placeholder="Supplier id"><br>

<select name="categoryid" ><option value="">General</option>
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
      <h3>Link With Existing Products</h3>
  
<select>
<option>Test Mode No Seller Selected  (You Must Login To Use This Option)</option>


</select>


  <input type="text" name="availablesize" placeholder="Available Size's"><br>

  <input type="text" name="availblecolors" placeholder="Available Color's"><br>


    </div>


    <div id="menu2" class="tab-pane fade">
      <h3>Upload Images of New Product</h3>
    
<input type='file'  name='fileToUpload'><br>


    </div>

    
  </div>


<input type="submit" value="submit">

</form>

</div>
</div>


<div class="col-md-4" style="margin-top: 10%;">

<div class="row">

<form action="" method="get">

<div class="col-md-2">
  
</div>
<div class="col-md-10">

<div  style="margin-top:0px;padding-top:0px;">


  <input type="text" class="form-control" name="searchkey" id="search2" placeholder="Search Products...">
</div>
</div>

</form>
</div>
<div class="row" style="border-style:solid;border-width:thin;border-color:#ffffff;border-bottom-color:#d9d9d9;padding:2%;">
<div class="col-md-2">
  
</div>
<div class="col-md-10" style="height: 500px;overflow-y: scroll;">
<div id="result2">
  
</div>

</div>
</div>





</div>
</div>
</div>
</body>
</html>