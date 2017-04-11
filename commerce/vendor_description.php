<!DOCTYPE html>
<html>
<head>
<title>Online Shopping India</title>

<link rel="stylesheet" href="/commerce/system/css/custom/view_products.css">

<link rel="stylesheet" href="/commerce/system/css/custom/productdescription.css">
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/ssl.php";?>
<script src='/commerce/system/js/jquery.elevatezoom.js'></script>

</head>
<body>




<?php include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/header.php";?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/rating/rating-procedure.php";?>
        
<div class="row" style="margin-left: 2px;margin-top: 100px;">
<div class="col-md-9" style="background-color: #ffffff;box-shadow: 0px 0px 1px gray;">
<div class="ibox-content" >                                   
<!-- ---------------------begin------------------------- -->


<?php
if($_GET['searchkey'] = "")
{
  $_GET['searchkey'] = "";
}

$product = "SELECT * FROM `products` WHERE productname LIKE '%".$_GET['searchkey']."%'";
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
            <a href="product-desc.php?id=<?php echo $result['productid'];?>" style="font-size: 16px;font-weight: bold;" ><?php echo $result['productname'];?></a></h3>
            <p class="text-muted">Our Price :<?php echo "  ".$result['discount'];?>  Rs</p>
            <del><p class="text-muted">Price :<?php echo "  ".$result['unitprice'];?>  Rs</p></del>
            <p class="text-muted">by :<?php echo $query_supplier_name['companyname'];?></p>
           
            <span class="label label-success">#1 Best Seller     </span><span style="color: gray;font-size: 12px;">You save :<?php echo $priceoff;?>  Rs</span><br>
            <span><a href="" style="color: #cc5200;"><span style="font-weight:bold;">See All Item:</span> from this seller <?php echo "  ".$count_product;?> </a></span>

         </div>
         <div class="panel-body text-center bg-gray-dark">
            <div class="row row-table">
              
              <div class="col-md-8">
                 
              </div>
                    
                   

          
            </div>
         </div>
    
      </div>
      <!-- END widget-->
   </div>


<?php 
   $i++;  




}

}


?>


</div>







   
          
  </div>

<!-- ---------------------end------------------------- -->

        <div class="col-md-3">
          <div class="ibox">
             
                <div class="ibox-content">
                    <div  style="padding:10px;">
                      <?php
                           $yah=mysqli_query($conn,"SELECT * FROM `suppliers` WHERE `supplierid` =".$_GET['vendor_id']."");
                               if($yah)
                                    {
                     while($show=mysqli_fetch_assoc($yah))
                                      {
                    ?>

                    <div class="row" style="color: #0066ff;font-weight: bold;font-size: 18px;"><?php echo $show['companyname'];?><hr></div>

                    <div class="row" style="color: gray;font-size: 12px;"><?php echo $show['address1'];?><i class="fa fa-map-marker" aria-hidden="true"></i>
                    <i style="font-size: 11px;"><?php echo "  ".$show['state'];?>,<?php echo "  ".$show['city'];?>,<?php echo "  ".$show['postalcode'];?></i>
                    </div>
                    <div class="row" style="color:#cc5200;font-weight: bold;font-size: 12px;"><i><?php echo $show['email'];?></i></div>
                  <?php include "system/php/rating/rating-system.php";?>

                    <?php
                                }
                            }
                                           
                    ?>
                    </div>
                   <hr>

                </div>

            </div>





   </div>
</div>


</div>


</div>

<style type="text/css">
     #gal1 img
   {
   
    margin-top: 5px;
    margin-left: 5px;
    width: 50px;
 
 

   }
   #main
   {
    width: 100%;
    
   }
   #text
   {
    font-size: 24px;
  
   }
 
 /*Change the colour*/
 .active img
 {
  border-style: solid;
  border-width: thin;
  border-color: #00ff00;
  box-shadow: 0px 0px 10px green;
 

}
</style>
<?php include "system/php/footer/footer.php";?>
<script type="text/javascript">
  $("#img_01").elevateZoom({
    gallery:'gal1', 
    cursor: 'pointer', 
    zoomType   : "window",
    galleryActiveClass: 'active',
     imageCrossfade: true,
     easing:true,
     easingDuration:500,
     borderSize:0,
     zoomWindowWidth:500,
     zoomWindowHeight:400
   }); 



</script>


</body>
</html>