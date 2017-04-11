<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">


<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/ssl.php";?>
<link rel="stylesheet" href="/commerce/system/css/custom/view_products.css">
<link rel="stylesheet" href="/commerce/system/css/w3.css">

</head>
<body style="background: #ffffff;">
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/header.php";

$get_store = "SELECT * FROM `resturants` WHERE id = ".$_GET['id']."";
$get_store_id = mysqli_query($conn,$get_store);
$get_details = mysqli_fetch_assoc($get_store_id)


?>

<div class="container-fluid">
   



<div class="row" style="margin-top: 80px;margin-left: 100px;">





      <h1><?php echo $get_details['r_name'];?></h1>



      <p><?php echo "Address :".$get_details['city']." ".$get_details['area_pincode'];?></p>
  

</div>

 <hr>    
<div class="col-md-2">
  <div class="ibox" id="menu" style="box-shadow: 0px 0px 1px black;">
                <div class="ibox-title">
                    <h4>Resturant Menu</h4><hr>
                </div>
                <div class="ibox-content" id="menu_content">
                   <?php

$get_menu = "SELECT * FROM `food_menu` WHERE supplier_id = ".$_GET['id']."";
$get_item = mysqli_query($conn,$get_menu);

if($get_item)
 {
 while ($get_result = mysqli_fetch_assoc($get_item)) 
 {
  ?>

 
<?php
$yah=mysqli_query($conn,"SELECT * FROM `food_products` WHERE menu_id =".$get_result['id']."");
$count = mysqli_num_rows($yah);
if($count > 0)
{
  ?>
   <a href="food_menu.php?id=<?php echo $_GET['id'];?>&fid=<?php echo $get_result['id'];?>" style='text-decoration:none;'>
 <span style="font-size: 16px;font-weight: bold;"><?php echo $get_result['name'];?></span></a>
<?php
echo '<span class="pull-right" style="font-size: 10px;border-radius:0px;">'.$count.' Items </span><hr>';

}

                        ?>
                 


<?php
    }

  }

?>

                </div>
            </div>

</div>




















<div class="col-md-7">
       <div class="row">                                   


  <?php

  $food_menu=mysqli_query($conn,"SELECT * FROM `food_menu` WHERE supplier_id = ".$_GET['id']."");

           if($food_menu)
                {
                    $i=1;                                
                 while($food_menu_items = mysqli_fetch_assoc($food_menu))
                 {
        echo "<span style='position:relative;top:50px;left:20px;font-size:30px;'>".$food_menu_items['name']."</span>";
        echo "<img src='".$food_menu_items['image_path']."' style='width:100%;height:150px;'><hr>";
      if(isset($_GET['fid']))
       {
        $yah=mysqli_query($conn,"SELECT * FROM `food_products` WHERE supplierid = ".$_GET['id']." AND menu_id =".$_GET['fid']."");
      
       }
       else
       {
        $yah=mysqli_query($conn,"SELECT * FROM `food_products` WHERE supplierid = ".$_GET['id']."");

       }
       
       $count = mysqli_num_rows($yah);
           if($count > 0)
                {
                    $i=1;                                
                 while($show=mysqli_fetch_assoc($yah))
                 {
                  ?>



                    <ul class="w3-ul w3-card-2">
 

  
      <!-- START widget-->
      <div class="main-body col-md-12">
      <div class="panel widget ">
         <div class="half-float">
            <div class="half-float-bottom">
            </div>
         </div>
         <div class="panel-body text-center">
            <h3 class="m0" ><a href="food_menu.php?id=<?php echo $show['id'];?>" style='font-weight: bold;'><?php echo $show['name'];?></a></h3>
            <p class="text-muted">Price :<?php echo $show['price'];?> Rs / Unit </p>
            <p>Time :<?php echo $show['min_time'];?> Hr</p>
            <p class="text-muted"><?php echo $show['description'];?></p>
         </div>
     
         
         <button class="w3-btn w3-white w3-border w3-round-large" style="margin: 10px;" id="add<?php echo $i;?>">Add to cart</button>
         <input type="hidden" id="productid<?php echo $i;?>" value="<?php echo $show['id'];?>">
         <?php 
         $string = $show['type'];
         if($show['type']=="Veg")
         {
          echo '<img src="system/media/green.png" width="30px" height="30px">';
         }
         else
         {
         
         echo '<img src="system/media/red.png" width="30px" height="30px">';
         }
         ?>
        
      </div>
      </div>
  </ul>
      <!-- END widget-->
   


<?php
$i++;
      }
    }
    else
    {
      echo "No Items in this Category";
    }
    echo "<hr>";
  }
}
else
{
  ?>

<h1>Not Item in this category</h1>

<?php
}
                                                       
?>
</div>

</div>




























<div class="col-md-3">
            <div class="ibox " id="cart_summary">
                <div class="ibox-title">
                    <img src="system/media/order.png"><span style="position: relative;left: 20px;">CART SUMMARY</span>
                </div>
                <div class="ibox-content">
                   <div id="cart">
                     




                   </div>
                 
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
                        When to Deliver
                        <input type="text" class="form-control" name="" placeholder="Time in hours" style="padding: 20px;">
                       <a href="food_checkout.php"> 
                       <button class="yellow-grade" style="margin: 10px;"><i class="fa fa-shopping-cart"></i> Checkout</button>
                       </a>
                        
                        </div>
                    </div>
                </div>
            </div>

            <div class="ibox">
                <div class="ibox-title">
                    <h5>Support</h5>
                </div>
                <div class="ibox-content text-center">
                    <span><img src="uploads/phone.png"></span>
                    <span>+7204203207</span><br>
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

<?php include "system/php/footer/footer.php";?>
<script type="text/javascript">




var windowsize = $(window).width();

if(windowsize > 995)
{
  
$(function(){
  var offset = 950;

  $(window).scroll(function(){
    if($(window).scrollTop() > offset)
    {
      $("#cart_summary").css({
        'position':'fixed',
        'top':'150px',
        'z-index':'2000'
      });
    }
    else
    {
      $("#cart_summary").css({
        'position':'static'
      });
    }
  });
});

$(function(){
  var offset2 = 300;

  $(window).scroll(function(){
    if($(window).scrollTop() > offset2)
    {
      $("#menu").css({
        'position':'fixed',
        'top':'150px',
        'width':'15%'
      });
    }
    else
    {
      $("#menu").css({
        'position':'static',
        'width':'100%'

      });
      
    }
  });
});


}


<?php

for($i=1;$i<=$count;$i++)
{

?>

$('#add<?php echo $i;?>').click(function(){

  var id<?php echo $i;?> = $("#productid<?php echo $i;?>").val();
  


    $.get('system/php/dynamic_cart/food_product_cart/food_add_to_cart.php',{id:id<?php echo $i;?>},function(data)
    {
      $('#empty').html(data);
        $.get('system/php/dynamic_cart/food_product_cart/food_cart_response.php',function(data)
    {
      $('#cart').html(data);
    });

      
    });


   

  });
<?php

}
?>

  $.get('system/php/dynamic_cart/food_product_cart/food_cart_response.php',function(data)
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
<style type="text/css">

</style>
</body>
</html>

