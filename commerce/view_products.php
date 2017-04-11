<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title></title>

<link rel="stylesheet" href="/commerce/system/css/custom/view_products.css">
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/ssl.php";?>
  <style type="text/css">
 input[type='text']
{
  box-shadow:0px 0px 1px #808080;
  padding:15px 10px;
  margin-bottom: 2px;
  width: 100%;
  background:linear-gradient(#ffffff,#f2f2f2);
  border-style: solid;
  border-width: thin;
  border-color: #808080;
  width: 100%;
  
}
  </style>
 </head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/header.php";




                 $sql="SELECT `catagory_id`,`catagory_name`,`description` FROM `catagory`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
?> <ol class="breadcrumb" style="margin-bottom: 0px;">

  <?php      while($result = mysqli_fetch_assoc($query))
        {

          ?>
           <li><a href="#"><?php echo $result['catagory_name'];?></a></li>
          <?php
       }
       ?>
     </ol>

<?php
     }   
    ?>



<div class="container-fluid">
        
<div class="row"  style="margin-left: 2px;margin-top: 50px;">
<div class="col-md-9" style="background-color: #ffffff; box-shadow: 0px 0px 1px gray;">
<div class="ibox-title">
             
                    <h3>Search Results  </h3>
                    <hr>
</div>
       <div class="row">                                   

<?php
if(isset($_GET['searchkey']))
{
if($_GET['searchkey'] == "")
{
  $_GET['searchkey'] = "";
}

$product = "SELECT * FROM `products` WHERE productname LIKE '".$_GET['searchkey']."%'";
$query = mysqli_query($conn,$product);



if($query)
{
  $count=1;

while($result = mysqli_fetch_assoc($query))
{



$supplier = "SELECT `companyname` FROM `suppliers` WHERE supplierid = ".$result['supplierid']."";
$supplier_name = mysqli_query($conn,$supplier);
$query_supplier_name = mysqli_fetch_assoc($supplier_name);


$product_count = "SELECT `productname` FROM `products` WHERE supplierid = ".$result['supplierid']."";
$query_count_product = mysqli_query($conn,$product_count);
$count_product = mysqli_num_rows($query_count_product);


?>




   <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
      <!-- START widget-->
      <div class="panel widget" style="margin-bottom: 10px;">
      
         <div class="half-float gallery">
            <a href="description.php?id=<?php echo $result['productid'];?>"><img src="<?php echo $result['thumb'];?>" alt="" class="img img-responsive" style='border-radius:0px;' > 
              <?php
              $unitprice = $result['unitprice'];
              $discountprice = $result['discount'];

              $priceoff = $unitprice - $discountprice;

              if($priceoff >= 1)
              {

              $percent = ($priceoff/$unitprice)*100;


              echo "<span class='tag2 hot'>".round($percent)."%</span>";
              }


              ?>
            
            </a>
            <div class="half-float-bottom">
            </div>
         </div>
         <div class="panel-body text-center" style="background-color: #ffffff;padding: 10px;margin-top: 1px;">
            <h3 class="m0">
              <a href="product-desc.php?id=<?php echo $result['productid'];?>" style="font-size: 16px;font-weight: bold;" ><?php echo $result['productname'];?>
                
              </a>
            </h3>
            <p class="text-muted">Our Price :<?php echo "  ".number_format($result['discount']);?>  Rs</p>

            <del>
              <p class="text-muted">Price :<?php echo "  ".number_format($result['unitprice']);?>  Rs</p>
            </del>

            <p class="text-muted">by :<?php echo $query_supplier_name['companyname'];?></p>
           
            <span class="label label-success">#1 Best Seller     </span>
            <span style="color: gray;font-size: 12px;">You save :<?php echo number_format($priceoff);?>  Rs</span><br>
            <span>
              <a href="vendor_description.php?vendor_id=<?php echo $result['supplierid'];?>" style="color: #cc5200;">
              <span style="font-weight:bold;">See All Item:</span> from this seller <?php echo "  ".$count_product;?> </a>
            </span>

         </div>
         <div class="panel-body text-center bg-gray-dark">
            <div class="row row-table">
              
            

          
            </div>
         </div>
    
      </div>
      <!-- END widget-->
   </div>


<?php 
   $count++;  

 }


}

}


?>

</div>

</div>


        <div class="col-md-3">
      


              <div class="ibox">

                <div class="ibox-title">
                  <span style="font-weight: bold;">Filter Results</span> 
                  
                </div>
                
                <div class="ibox-content">


                
        
                </div>
            </div>

    
            <div class="ibox">
                <div class="ibox-content">

                    <p class="font-bold">
                    Suggestion from Stepdoor
                    </p>
                    <hr>
              
            </div>
        </div>





  
</div>
</div>
</div>
<div id="ads"></div>
<?php include "system/php/footer/footer.php";?>
<?php

$get_product = "SELECT * FROM `advertisment`";
$get_query = mysqli_query($conn,$get_product);

if($get_query)
 {
 while ($get_result = mysqli_fetch_assoc($get_query)) 
 {


$rappear[] = $get_result['duration_reappear'];
$page[] = $get_result['page'];

    }

  }

?>
<script type="text/javascript">



    
    $(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});

      jQuery(document).on('click', '.mega-dropdown', function(e) {
  e.stopPropagation()
});

 var page = "view_products";

<?php

for($i=1;$i<=$count;$i++)
{

?>

$('#add_cart<?php echo $i;?>').click(function(){

  var id<?php echo $i;?> = $("#productid<?php echo $i;?>").val();
    


    $.get('system/php/dynamic_cart/regular_product_cart/add_to_cart.php',{id:id<?php echo $i;?>},function(data)
    {
      $('#empty').html(data);
        $.get('system/php/dynamic_cart/regular_product_cart/cart_response.php',function(data)
    {
      $('#cart').html(data);
    });

      
    });


   

  });
<?php

}
?>

  $.get('system/php/dynamic_cart/regular_product_cart/cart_response.php',function(data)
    {
      $('#cart').html(data);
    });

var page = "sort";
        setInterval(function(){ 

      $.get('system/php/admin/dynamic_concepts/php/advertise.php',{page:page},function(data)
    {
      $('#ads').html(data);
    });

    }, <?php echo $rappear[1];?>);
     $.get('system/php/admin/dynamic_concepts/php/advertise.php',{page:page},function(data)
    {
      $('#ads').html(data);
    });
</script>

</body>
</html>