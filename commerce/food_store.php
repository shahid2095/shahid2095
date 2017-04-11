<!DOCTYPE html>
<html>
<head>
  <title><?php echo "Online Shopping India"; ?></title>
<meta charset="utf-8">



<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/ssl.php";?>
    <script type="text/javascript" src="system/js/jquery.countdown.min.js"></script>
<link rel="stylesheet" href="/commerce/system/css/custom/view_products.css">
</head>
<body>
<?php include "system/php/header/header.php";?>



<?php

if(!(isset($_GET['pincode'])))
{
?>

<div class="modal" id="myModal">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Enter Your area pincode</h4>
        </div>
        <div class="modal-body">
        <form action="" method="get">        
         <input type="text" class="form-control" name="pincode">
        </div>
        <div class="modal-footer">
          
          <input type="submit" name="submit" value="Save">
          </form>

        </div>
      </div>
    </div>
</div>
<?php
}





?>





<div class="container-fluid">
        
<div class="row" style="margin-top: 100px;">
<div class="col-md-9">
<div class="ibox-title">
             
                    <h2>Hotel's / Resturants </h2>
                </div>
       <div class="row">                                   


  <?php
       

       if(isset($_GET['pincode']))
                    {

                    $yah=mysqli_query($conn,"SELECT * FROM `resturants` WHERE area_pincode = ".$_GET['pincode']."");

                    }
                    else
                    {
                      $yah=mysqli_query($conn,"SELECT * FROM `resturants`");
                    }



           if($yah)
                {
                                                    
                 while($show=mysqli_fetch_assoc($yah))
                 {
                  ?>




   <div class="col-md-4 col-sm-6 col-xs-12 col-lg-3">
      <!-- START widget-->
      <div class="panel widget">
         <div class="half-float">
            <a href="food_menu.php?id=<?php echo $show['id'];?>"><img src="<?php echo $show['image_path'];?>" alt="" class="img-responsive" ></a>
            <div align="center">
                    <a href='description.php?id=<?php echo $_GET['id'];?>&rating=1&place=one'  id='id1' caria-label="Left Align">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </a>
          <a href='description.php?id=<?php echo $_GET['id'];?>&rating=2&place=two'   id='id2' aria-label="Left Align">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </a>
          <a href='description.php?id=<?php echo $_GET['id'];?>&rating=3&place=three'   id='id3' aria-label="Left Align">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </a>
          <a href='description.php?id=<?php echo $_GET['id'];?>&rating=4&place=four'   id='id4' btn-sm" aria-label="Left Align">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </a>
          <a href='description.php?id=<?php echo $_GET['id'];?>&rating=5&place=five'   id='id5'btn-sm" aria-label="Left Align">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </a>
            </div>
            <div class="half-float-bottom">
            </div>
         </div>
         <div class="panel-body text-center">
            <h3 class="m0"><a href="food_menu.php?id=<?php echo $show['id'];?>"><?php echo $show['r_name'];?></a></h3>
            <p class="text-muted"><?php echo $show['city'];?></p>
            <p>Our Moto is to Serve yu best food there is</p>
         </div>
         <div class="panel-body text-center bg-gray-dark">
            <div class="row row-table">
               <div class="col-xs-12">
                
                  <h5 class="m0">Working hour</h5>
                  <p class="m0">10am - 10pm</p>
               </div>
            </div>
         </div>
      </div>
      <!-- END widget-->
   </div>


<?php
  }
}
                                                       
?>
</div>

</div>


        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><b>Sort Resturants </b> <i>Your Pincode </i><?php

                    if(isset($_GET['pincode']))
                    {

                     echo $_GET['pincode']."   <a href='food_store.php' class='btn btn-warning btn-sm'>Change</a>";

                    }
                    else
                    {
                      echo "<a href='food_store.php' class='btn btn-warning btn-sm'>Set Pincode</a>";
                    }

                     ?>
                       
                     </h5>
                  
                    <hr>
                </div>
                <div class="ibox-content">
                <form action="" method="get">

              
                   <div class="row"> <div class="col-md-10">Only Veg</div>
                   <div class="col-md-1"> <input class="pull-right" type="checkbox" name="veg"></div>
                   </div>
                   <div class="row"><div class="col-md-10"> Only Non-Veg </div>
                   <div class="col-md-1"><input class="pull-right"  type="checkbox" name="nveg"></div>
                   </div>
                   <div class="row"><div class="col-md-10"> Other</div> 
                   <div class="col-md-1"><input class="pull-right"  type="checkbox" name="other"></div>
                   </div>
                   <div class="row"><div class="col-md-10"> 1hr Rush</div> 
                   <div class="col-md-1"> <input class="pull-right"  type="checkbox" name="h1"></div>
                   </div>
                   <div class="row"> <div class="col-md-10">less than 2hr Rush</div>
                   <div class="col-md-1"> <input class="pull-right"  type="checkbox" name="h2"></div>
                   </div>
                   <div class="row"> <div class="col-md-10">Select District</div>
                   <div class="col-md-1"></div>
                   </div>
                   <select name="city">
                     <option value="">None</option>
                     <option value="">gulbarga</option>
                     <option value="">banglore</option>
                     <option value="">bidar</option>
                     <option value="">belgum</option>
                     <option value="">mysore</option>
                   </select>
                    <input type="hidden" name="pincode" value="<?php echo $_GET['pincode'];?>">
                  <input type="submit" name="" value="Go" class="round-default">
                  </form>
                    <hr>
                    <span class="text-muted small">
                        *No Special Notice
                    </span>
                   
                </div>
            </div>

            <div class="ibox">
                <div class="ibox-title">
                    <h5><b>Support</b></h5>
                </div>
                <div class="ibox-content text-center">
                    <h3><i class="fa fa-phone"></i></h3>
                    <span class="small">
                        Please contact with us if you have any questions. We are avalible 24h.
                    </span>
                </div>
            </div>
            <hr>
            <div class="ibox">
                <div class="ibox-content">

                    <p class="font-bold">
                    <b>Resturants Suggestion from Stepdoor</b>
                    
                    </p>
                    <hr>
                    <div>
                        <a href="#" class="product-name"> Taj Resturant</a>
                        <div class="small m-t-xs">
                            Serve you best food
                        <div class="m-t text-righ">
                        </div>
                    </div>
                    <hr>
                    <div>
                        <a href="#" class="product-name"> Maharaja Sweets</a>
                        <div class="small m-t-xs">
                            Best Sweets in Market
                        </div>
                        <div class="m-t text-righ">
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
</div>
<?php include "system/php/footer/footer.php";?>
<script type="text/javascript">
  $('document').ready(function(){
  $('#myModal').modal({show:true})
});

$('#myModal').on('show.bs.modal', function (e) {
    console.log('modal show');
});
</script>


</body>
</html>