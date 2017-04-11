<html >
<head>
<title>Ecommerce</title>



<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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

<div class="row">
<div class="col-lg-1"></div>

<div class="col-lg-4">
  


<div class="row">
                              <h4>Filter Products By </h4>
                                
                                <form action="" method="get">
                                  <input type="text" class="form-control" name="search_term" placeholder="Enter Search to Display">

                                  <select  name="filter_by" class="form-control"  id="filter_by2">
                                  
                                    <option value="companyname">Name</option>
                                    <option value="postalcode">Pincode</option>
                                    <option value="phone">Contact Number</option>
                                    <option value="email">Email</option>
                                  </select>
                              <input type="submit" name="key" value="Find This" class="round-default" style="padding: 10px;border-radius: 40%;">
                                </form>
                                



    
  </div>
<div class="row">
   <?php

                                    if(isset($_GET['search_term']))
                                    {
                                    if($_GET['search_term']==null)
                                  {
                                    $_GET['search_term'] == "";
                                  }
                                  if($_GET['filter_by']==null)
                                  {
                                    $_GET['filter_by'] == "name";
                                  }
                                  ?>


                                  <div id="ajax-return">
                                  <div id="sub_ajax_return">
                                    Search <?php echo $_GET['search_term'];?>

                                  </div>

                                  <div id="two_sub_ajax_return">
                                    Filter By <?php echo $_GET['filter_by'];?>
                                  </div>
                                  <hr>
                                  <form action="" method="get">
                                  <select name="supplierid">
                                  <option>Select vendor</option>
                                  <?php


                                  $yah=mysqli_query($conn,"SELECT * FROM `suppliers` WHERE `".$_GET['filter_by']."` LIKE '".$_GET['search_term']."%'");
                                             if($yah)
                                                  {
                                                                                      
                                                   while($show=mysqli_fetch_assoc($yah))
                                                    {
                                                    ?>
                                <option value="<?php echo $show['supplierid'];?>"><?php echo $show['companyname'];?></option>   

                                            <?php
                                              }
                                          }

                                  ?>

                                  </select>
                                  <input type="submit" name="" value="Go" class="round-default">
                                  </form>
                                  </div>

                                  <?php

                                    }


                                  ?>


    
  </div>
  <div class="row">
                                          <h4>Product by Vendors</h4>
                                            <form action="" method="get">  
                                          <div id="product-view">
                                           <div class="row">
                                        <select name="status">
                                        <option>Select Product</option>
                                            <?php

                                              if(isset($_GET['supplierid']))
                                              {
                                                 $yah=mysqli_query($conn,"SELECT * FROM `products` WHERE supplierid =".$_GET['supplierid']." ");
                                                   if($yah)
                                                        {
                                                                                            
                                                         while($show=mysqli_fetch_assoc($yah))
                                                          {
                                                          ?>

                                                   <option value="<?php echo $show['productid'];?>"><?php echo $show['productname'];?></option>  

                                                  <?php
                                                    }
                                                }
                                              }
                                              else
                                              {
                                                ?>
                                                    <span style="color: gray;padding: 10px;font-weight: bold;">Filter not set</span>
                                                <?php
                                              }
                                                                                               
                                            ?>
                                            </select>
                                            </div>
                                          </div>
                                        
                                          
                                          <input type="submit" name="submit" class="yellow-grade" value="Select This Product" >
                                          </form>
          </div>


<div class="row">
  
                                                 <h3>Select Variations</h3> 
                                                 <?php
                                                 if(isset($_GET['status']))
                                                 {
                                                 echo "<span>".$_GET['status']."</span>";
                                                 }

                                                 ?>
                                              
                                                      <hr>
       
                                             
                                             <form action="" method="get">
                                             <input type="hidden" name="pname" value="<?php echo $_GET['status'];?>">

                                        <select name="attribute" style="padding: 5px;">

                                          <option value="">Select Attribute</option>
                                              <?php
                                               $yah=mysqli_query($conn,"SELECT * FROM `product_attributes`");
                                                   if($yah)
                                                        {
                                         while($show=mysqli_fetch_assoc($yah))
                                                          {
                                        ?>
                                        <option value="<?php echo $show['id'];?>"><?php echo $show['name'];?></option>
                                        

                                        <?php
                                                    }
                                                }
                                                               
                                        ?>
          
                                        
                                      </select>

                                      <input type="submit" name="submit" class="round-default" value="Go">
                                        
                                      </form>




           </div>
            <div class="row">

                                                     <?php  

                                                     if(isset($_GET['attribute']))
                                                     {
                                                        $query = mysqli_query($conn,"SELECT * FROM `attribute_values` WHERE attribute_id = ".$_GET['attribute']."");
                                                    

                                          ?>
                                            
                                          <form name="bulk_action_form" action="" method="get">
                                          <input type="hidden" name="pname" value="<?php echo $_GET['pname'];?>">
                                          <input type="hidden" name="attribute" value="<?php echo $_GET['attribute'];?>">
                                         
                                           <select name="attri_value">
                                                  <?php
                                                      if(mysqli_num_rows($query) > 0){
                                                          while($result = mysqli_fetch_assoc($query)){
                                                                 
                                                  ?>
                                                  <option value="<?php echo $result['value_name'];?>"><?php echo $result['value_name'];?></option>
                                                  <?php
                                                     } 
                                                  }
                                                  else
                                                    { 
                                                      ?>
                                                      <option>No Associated Attribute</option>
                                                  <?php 
                                                  } 
                                                  ?>
                                               </select>
                                              <input type="submit" class="round-default" name="set_attr_val" value="Go"/>
                                          </form>
                                          <?php


                                          }
                                          ?>

           </div>

























</div>
  
<div class="col-lg-7">
  


  <div id="product-insert">

<form  action="php/insert-linked-product.php" method='post' enctype='multipart/form-data'>


      <h3 style="margin-left: 50px;">Link A New Product</h3>

<div class="row">
  <div class="col-md-1"></div>

  <div class="col-md-8">

   
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

  <input type="hidden" name="pname" value="<?php echo $_GET['pname'];?>">
   <input type="hidden" name="attribute" value="<?php echo $_GET['attribute'];?>">                                        
 <input type="hidden" name="attri_value" value="<?php echo $_GET['attri_value'];?>">
  <input type="text" name="unitprice" placeholder="Unit price"><br>

  <input type="text" name="msrp" placeholder="Msrp"><br>

  <input type="text" name="size" placeholder="Size"><br>

  <input type="text" name="color" placeholder="Color"><br>

<input type="text" name="discount" placeholder="Discount"><br>


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

      <h3>Upload Images of New Product</h3>
    
<input type='file'  name='fileToUpload'><br>

  <input type="submit" name="" value="Add Product" class="yellow-grade">

  </div>

  </div>

 

  </form>
</div>

  </div>
    </div>




</body>
</html>