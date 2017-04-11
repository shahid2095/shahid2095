<!DOCTYPE html>
<html>
<head>
<title>Online Shopping India</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="/commerce/system/css/custom/view_products.css">
<link rel="stylesheet" href="/commerce/system/css/custom/megamenu.css">
<link rel="stylesheet" href="/commerce/system/css/custom/luminous_buttons.css">
<link rel="stylesheet" href="/commerce/system/css/custom/productdescription.css">
<link rel="stylesheet" href="/commerce/system/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src='/commerce/system/js/jquery.elevatezoom.js'></script>

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
        
<div class="row" style="margin-left: 2px;margin-top: 0px;">
<div class="col-md-10" style="background-color: #ffffff;box-shadow: 0px 0px 1px gray;">
<div class="ibox-content" >                                   

   
          
  </div>

<!-- ---------------------end------------------------- -->

        <div class="col-md-2">
        

   </div>
</div>


</div>


</div>


</body>
</html>