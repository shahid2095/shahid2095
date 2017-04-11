<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <!-- 
    	The codes are free, but we require linking to our web site.
    	Why to Link?
    	A true story: one girl didn't set a link and had no decent date for two years, and another guy set a link and got a top ranking in Google! 
    	Where to Put the Link?
    	home, about, credits... or in a good page that you want
    	THANK YOU MY FRIEND!
    -->
    <title></title>

<link rel="stylesheet" href="/commerce/system/css/custom/view_products.css">
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/ssl.php";?>
    <style type="text/css">
      body{
    background:#eee;
}

.text-navy {
    color: #1ab394;
}
.cart-product-imitation {
  text-align: center;
  padding-top: 30px;
  height: 80px;
  width: 80px;
  background-color: #f8f8f9;
}
.product-imitation.xl {
  padding: 120px 0;
}
.product-desc {
  padding: 20px;
  position: relative;
}
.ecommerce .tag-list {
  padding: 0;
}
.ecommerce .fa-star {
  color: #d1dade;
}
.ecommerce .fa-star.active {
  color: #f8ac59;
}
.ecommerce .note-editor {
  border: 1px solid #e7eaec;
}
table.shoping-cart-table {
  margin-bottom: 0;
}
table.shoping-cart-table tr td {
  border: none;
  text-align: right;
}
table.shoping-cart-table tr td.desc,
table.shoping-cart-table tr td:first-child {
  text-align: left;
}
table.shoping-cart-table tr td:last-child {
  width: 80px;
}
.ibox {
  clear: both;
  margin-bottom: 25px;
  margin-top: 0;
  padding: 0;
}
.ibox.collapsed .ibox-content {
  display: none;
}
.ibox:after,
.ibox:before {
  display: table;
}
.ibox-title {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background-color: #ffffff;
  border-color: #e7eaec;
  border-image: none;
  border-style: solid solid none;
  border-width: 3px 0 0;
  color: inherit;
  margin-bottom: 0;
  padding: 14px 15px 7px;
  min-height: 48px;
}
.ibox-content {
  background-color: #ffffff;
  color: inherit;
  padding: 15px 20px 20px 20px;
  border-color: #e7eaec;
  border-image: none;
  border-style: solid solid none;
  border-width: 1px 0;
}
.ibox-footer {
  color: inherit;
  border-top: 1px solid #e7eaec;
  font-size: 90%;
  background: #ffffff;
  padding: 10px 15px;
}

.widget .panel, .widget.panel {
  overflow: hidden;
}

.widget {
  margin-bottom: 10px;
  border: 0;
}

.bg-gray-darker {
  background-color: #232735;
  color: #fff!important;
}

.half-float {
  position: relative;
  margin-bottom: 20px;
}

.half-float .half-float-bottom, .half-float .half-float-top {
  position: absolute;
  left: 50%;
  bottom: -60px;
  width: 120px;
  height: 120px;
  margin-left: -60px;
  z-index: 2;
}

.thumb128 {
  width: 128px!important;
  height: 128px!important;
}

.half-float+* {
  margin-top: -55px;
  padding-top: 65px;
}

.m0 {
  margin: 0!important;
  font-size: 14px;
}

.bg-gray-dark {
  background-color: #3a3f51;
  color: #fff!important;
  width: 300px;
}

.row-table {
  display: table;
  table-layout: fixed;
  height: 100%;
  width: 100%;
  margin: 0;
}

.row-table>[class*=col-] {
  display: table-cell;
  float: none;
  table-layout: fixed;
  vertical-align: middle;
}
img
{
  width: 300px;
  height: 200px;
}
    </style>
</head>
<body>
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/header.php";?>
<div class="container-fluid">
        
<div class="row" style="background-color:#ffffff; ">
<div class="col-md-2">
        <div class="ibox">
                <div class="ibox-title">
                    <h5>Resturant Menu</h5>
                </div>
                <div class="ibox-content">
                    <a href=""><span>Arabian  <span class="text-muted small">
                        (10)
                    </span></span></a><br>

                    <a href=""><span>Chinese  <span class="text-muted small">
                       (5)
                    </span></span></a><br>

                    <a href=""><span>Indian  <span class="text-muted small">
                        (25)
                    </span></span></a><br>

                    <a href=""><span>Special Biryani <span class="text-muted small">
                       (2)
                    </span></span></a><br>

                    <a href=""><span>Hotel Specials <span class="text-muted small">
                      (3)
                    </span></span></a><br>

                    <a href=""><span>Thai Food  <span class="text-muted small">
                       (12)
                    </span></span></a><br>

                    <a href=""><span>Cool Drinks<span class="text-muted small">
                        (10)
                    </span></span></a><br>

                    <a href=""><span>Snacks <span class="text-muted small">
                        (10)
                    </span></span></a><br>
                  
                  
                  
                </div>
            </div>

</div>
<div class="ibox-title">
             
                    <h5>From Hotel Maharaja </h5><hr> <h6>Gulbarga Address:Shop.no 86 Market Road </h6>
                </div>
<div class="col-md-7">
       <div class="row">                                   


  <?php
       $yah=mysqli_query($conn,"SELECT * FROM `food_products` LIMIT 5");
       $count = mysqli_num_rows($yah);
           if($yah)
                {
                    $i=1;                                
                 while($show=mysqli_fetch_assoc($yah))
                 {
                  ?>




  
      <!-- START widget-->
      <div class="panel widget">
         <div class="half-float">
            <div class="half-float-bottom">
            </div>
         </div>
         <div class="panel-body text-center">
            <h3 class="m0" ><a href="food_menu.php?id=<?php echo $show['id'];?>" style='font-weight: bold;'><?php echo $show['name'];?></a></h3>
            <p class="text-muted">Price :<?php echo $show['price'];?> Rs / Unit </p>
            <p>Time :<?php echo $show['min_time'];?> Hr</p>
         </div>
         <div class="panel-body text-center bg-gray-dark">
            <div class="row row-table">
               <div class="col-md-6">
                  <h3 class="m0"><h3 class="m0">Servable <?php echo $show['servable'];?></h3>
                  
               </div>
               <div class="col-md-6">
                  
                  <h3 class="m0">Total :<?php echo $show['price'];?> Rs</h3>
               </div>
             
            </div>

         </div>
         <button class="btn btn-default btn-sm" id="add<?php echo $i;?>">Add to cart</button>
         <input type="hidden" id="productid<?php echo $i;?>" value="<?php echo $show['id'];?>">
         <?php 
         $string = $show['type'];
         if($show['type']=="Veg")
         {
          echo '<span style="color: green;">'.$show['type'];'</span';
         }
         else
         {
         
         echo '<span style="color: red;">'.$show['type'].'</span>';
         }
         ?>
        
      </div>
      <!-- END widget-->
   


<?php
$i++;
  }
}
                                                       
?>
</div>

</div>


        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Cart Summary</h5>
                </div>
                <div class="ibox-content">
                   <div id="cart">
                     




                   </div>
                   <hr>
                    <div id="ip">
                      




                    </div>
                    <div id="ip_sub">
                      
                    </div>

                    <hr>
                    <span class="text-muted small">
                        *No Special Notice
                    </span>
                    <div class="m-t-sm">
                        <div class="btn-group">
                        When to Deliver<input type="text" class="form-control" name="" placeholder="Time in hours">
                        <span class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Checkout</span>
                        <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ibox">
                <div class="ibox-title">
                    <h5>Support</h5>
                </div>
                <div class="ibox-content text-center">
                    <h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
                    <span class="small">
                        Please contact with us if you have any questions. We are avalible 24h.
                    </span>
                </div>
            </div>

            <div class="ibox">
                <div class="ibox-content">

                    <p class="font-bold">
                    Suggestions from Stepdoor
                    </p>
                    <hr>
                    <div>
                        <a href="#" class="product-name">Chilly Chicken</a>
                        <div class="small m-t-xs">
                            From :<a href="">Taj-Hotel</a>
                        </div>
                        <div class="m-t text-righ">
                        </div>
                    </div>
                    <hr>
                    <div>
                        <a href="#" class="product-name"> Veg Handi</a>
                        <div class="small m-t-xs">
                            From :<a href="">Darbaar</a>
                        </div>
                        <div class="m-t text-righ">
                        </div>
                    </div> <hr>
                     <div>
                        <a href="#" class="product-name"> Jamun (sweets)</a>
                        <div class="small m-t-xs">
                            From :<a href="">Gulbarga sweets</a>
                        </div>
                        <div class="m-t text-righ">
                        </div>
                    </div> <hr>
                     <div>
                        <a href="#" class="product-name"> Thali</a>
                        <div class="small m-t-xs">
                            From :<a href="">Arabi Food</a>
                        </div>
                        <div class="m-t text-righ">
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>

<?php include "inc/footer.php";?>
<script type="text/javascript">


<?php

for($i=1;$i<=$count;$i++)
{

?>

$('#add<?php echo $i;?>').click(function(){

  var id<?php echo $i;?> = $("#productid<?php echo $i;?>").val();
    


    $.get('inc/food_add_to_cart.php',{id:id<?php echo $i;?>},function(data)
    {
      $('#empty').html(data);
        $.get('inc/food_cart_response.php',function(data)
    {
      $('#cart').html(data);
    });

      
    });


   

  });
<?php

}
?>

  $.get('inc/food_cart_response.php',function(data)
    {
      $('#cart').html(data);
    });

  $.get('ip_php/get_ip.php',function(data)
    {
      $('#ip').html(data);
    });
 $.get('ip_php/ip_get_location.php',function(data)
    {
      $('#ip_sub').html(data);
    });
</script>
</body>
</html>

