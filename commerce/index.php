<!DOCTYPE html>
<html>
<head>
	<title><?php echo "Online Shopping India"; ?></title>
<meta charset="utf-8">

<link rel='stylesheet' href='system/css/owl.carousel.css'>
<link rel='stylesheet' href='system/css/owl.theme.css'>
<link rel='stylesheet' href='system/css/owl.transitions.css'>
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/ssl.php";?>
<script type='text/javascript' src='system/js/jssor/jssor.js'></script>
<script type='text/javascript' src='system/js/jssor.slider.mini.js'></script>
   </head>
<body>
<?php include "system/php/header/header.php";?>


<div id="ads"></div>

<div class="row"><div class="col-md-1"></div>
<div class="col-md-8" style="padding:0px;margin:0px;">
<div class="container-fluid">
<?php include "system/php/general/count-values.php";?>
<?php

for($i=1;$i<=$row_cnt;$i++)
{
?>
<div class='row'>


<h3><?php echo $res[$i]['heading'];?> </h3>

<div id="owl-demo<?php echo $i; ?>" class="owl-carousel owl-theme">


    <?php
   
      $sql="SELECT * FROM `products`";
      $query = mysqli_query($conn,$sql);
     
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {?>
     <div class="item">
     <a href="description.php?id=<?php echo $result['productid'];?>">
        <img src="<?php echo $result['medium'];?>" class="img img-responsive "><br><?php echo $result['productname'];?>
    </a>
        </div>


      <?php
      }
      }

      

     ?>

  </div>
 </div>
<?php
}
?>
 </div>
 </div>


</div>
<?php include "system/php/footer/footer.php";?>
<?php include "system/php/general/lpage-controller.php";?>
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
  
var page = "home";
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