<!DOCTYPE html>
<html>
<head>
<title>Online Shopping India</title>



<?php 
 include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/ssl.php";?>
<link rel="stylesheet" href="/commerce/system/css/custom/view_products.css">
<link rel="stylesheet" href="/commerce/system/css/custom/productdescription.css">
<script src='/commerce/system/js/jquery.elevatezoom.js'></script>
<link rel='stylesheet' href='system/css/owl.carousel.css'>
<link rel='stylesheet' href='system/css/owl.theme.css'>
<link rel='stylesheet' href='system/css/owl.transitions.css'>
<style type="text/css">
  span .glyphicon-star
  {
    color: #ffffff;
  }
</style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/header.php";?>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/rating/rating-procedure.php";?>
<div class="container-fluid" style="margin-top: 100px;">

        
<div class="row" style="margin-left: 2px;margin-top: 0px;">
<div class="col-md-9" style="background-color: #ffffff;box-shadow: 0px 0px 1px gray;">
<div class="ibox-content" >                                   
<!-- ---------------------begin------------------------- -->

<?php 

$id = $_GET['id'];

$product = "SELECT * FROM `products` WHERE productid = ".$id."";
$query = mysqli_query($conn,$product);
$result = mysqli_fetch_assoc($query);

$comment1 = "SELECT * FROM `comment_database` WHERE productid = '".$id."' ";
$query_comment1 = mysqli_query($conn,$comment1);
$i = 1;
  $comment_cnt = mysqli_num_rows($query_comment1);

$spec = "SELECT `title`, `detail` FROM `specification` WHERE productid = ".$id."";
$query_spec = mysqli_query($conn,$spec);

$list = "SELECT `list` FROM `list_description` WHERE productid = ".$id."";
$query_list = mysqli_query($conn,$list);

$supplier = "SELECT `companyname` FROM `suppliers` WHERE supplierid = ".$result['supplierid']."";
$supplier_name = mysqli_query($conn,$supplier);
$query_supplier_name = mysqli_fetch_assoc($supplier_name);
?>
<div class="row" style="margin-top: 5%;">
  <div >

  <div class="col-md-5">
<div class="main">
  <img id="img_01" src='<?php echo $result['medium'];?>' class="img img-responsive" data-zoom-image="<?php echo $result['picture'];?>"/>

</div>

          
<div id="gal1" style="width: 520px;overflow: hidden;margin-top: 30px;" class="img img-responsive">
 
  <a href="#" data-image="<?php echo $result['thumb'];?>" data-zoom-image="<?php echo $result['picture'];?>">
    <img id="img_01" src="<?php echo $result['picture'];?>">
  </a>

<!--<a href="#" data-image="small/image2.png" data-zoom-image="large/image2.jpg">
    <img id="img_01" src="thumb/image2.jpg" />
  </a>-->


 
</div>


</div>
 <div class="col-md-1"></div>
<div class="col-md-6">



<div class="row">
 
  <div class="col-md-12" style="padding:10px;">
            <p style="font-size:25px;"><?php echo $result['productname'];?></p>

        
                <?php include "system/php/rating/rating-system.php";?>

         

            <?php echo "&nbsp&nbsp".$total_clicks."  "; ?><b>Customer's Voted </b>
            <span>

              <a href="#comments_section">Customer's Review<?php echo "  ".$comment_cnt;?></a>

            </span>

  

            <hr>

          <h3 style="color:gray;">Price:Rs.  <?php echo number_format($result['discount']);?></h3>
          <b style="color: gray;font-size: 13px;"><i>Condition :</i></b>
          <span style="font-size: 18px;font-weight: bolder;color: orange;" class="btn btn-default">
          <?php echo $result['_condition'];?>           
          </span>

          <div style="margin-top: 50px;">
<div class="row">
   <button class="yellow-grade" id="add-cart" style="padding:2% 6%;">ADD TO CART</button>
          <input type="hidden" name="id" id="productid" value="<?php echo $result['productid']?>">
            <a href="checkout.php"><button class="blue-grade" style="padding:2% 10%;">BUY NOW</button></a>
</div>
         
</div>
          <hr>
          <span style="color:gray;font-size:16px;"><del>Rs.  <?php echo number_format($result['msrp']);?></del></span><br>

          




            <?php

                 if($query_list)
                {
                  while($result_list = mysqli_fetch_assoc($query_list))
                  {?>
                   
                     <tr>
                  <li style="color:gray;font-size:14px;"><?php echo $result_list['list']."<br>";?></li>
                
                </tr>
                  <?php
                }
            }

                ?><br>
            

<!--Prodcuts Attrubute starts here -->

    
  <div style="margin-bottom: 20px;">
    <?php

$get_product_links = "SELECT * FROM `linked_products` WHERE linked_productid =".$id."";
$get_query_links = mysqli_query($conn,$get_product_links);

if($get_query_links)
 {
 while ($get_result_links = mysqli_fetch_assoc($get_query_links)) 
 {
 
    $get_attribute = "SELECT * FROM `product_attributes` WHERE id =".$get_result_links['attribute']."";
$get_query_attribute = mysqli_query($conn,$get_attribute);
 
 $get_attribute_name = mysqli_fetch_assoc($get_query_attribute);
?>

<?php echo $get_attribute_name['name'];?>

<span><a href="#"><button class="btn btn-sm btn-default">
<?php echo $get_result_links['attr_value'];?></button></a></span> 



<?php

    }

  }

?>

  </div>


<!--Prodcuts Attrubute ends here -->

  <span style="box-shadow: 0px 0px 1px black;padding:10px;font-size: 18px;color: #595959;">Short Note's: 
  <span style="color: #404040;"><?php echo $result['note'];?></span>
  </span>


  </div>


</div>
<br><br>


</div>

</div>
</div>



<!-- product description and side applete part ended here -->



<!-- /container -->




<div class="container-fluid">
  

<div style="margin-top: 2%;">
    <h4 >Product Description</h4>
<?php

if($result['productdescription'] == '')
{
  ?>
  <p>Seller Provided No Description About this Product</p>
<?php
}
else
{

  ?>  <p><?php echo $result['productdescription'];?></p>

<?php
}





?>
</div>
  <h4>Related Products</h4>


    <?php include "system/php/products/related_products.php";?>


  <h4>Recommended Products</h4>


    <?php include "system/php/products/recomended_products.php";?>


  

  <h4>Sponsored Products</h4>


    <?php include "system/php/products/sponsered_products.php";?>








<!-- Product Description ends here -->

  <h4 style="margin-top: 2%;">Specification</h4>
  <div class="row">
  
  <div class="col-md-8">
<?php


$row = mysqli_num_rows($query_spec);

if($row <= 0)
{
  ?>
  <p>Seller Provided No Specification About this Product</p>
<?php
}
else
{

  ?>  

  <table style="border-style: dotted;border-width: thin;border-color: gray;" >
    <thead >
    
    </thead>
    <tbody>
     
     <?php

       if($query)
      {
        while($result_spec = mysqli_fetch_assoc($query_spec))
        {?>
         
           <tr style="border-style: dotted;border-width: 1px;border-color: gray;border-left-color:#ffffff;border-right-color:#ffffff;" >
        <td style="color:gray;font-size:14px;background-color:#ebebeb;margin-right:10px;padding: 1%;"><?php echo $result_spec['title'];?></td>
        <td style="color:gray;font-size:14px;margin-right:10px;padding: 1%;"><?php echo $result_spec['detail'];?></td>
      
      </tr>
        <?php
      }
  }

      ?>


    </tbody>
  </table>

<?php
}





?>


  </div>
  <div class="col-md-4">
  </div>

  </div>

<!-- Product Specification Ends Here -->





</div>
<div class="container" style="margin-top: 10px;">
<form action="system/php/comments/insert_comment.php" method="post">
<textarea class="form-control" placeholder="Write your comment" rows="5" name="msg" style="width:60%"></textarea>
          <br>
          <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
         
          <input type="submit" name="" class="btn btn-success" value="Post Comment">

</form>
 <a class="small pull-left" href="login.php">Login to you existing account</a>
 </div> 
 <div id="comments_section">
<?php include "system/php/comments/comment-box.php";?>
</div>

</div>







   
          
  </div>

<!-- ---------------------end------------------------- -->

        <div class="col-md-3">
        
              <div class="ibox">
             
                <div class="ibox-content">
                 <span style="color:gray;font-size:16px;">
    SOLD BY: <a href="vendor_description.php?vendor_id=<?php 
    $id = $result['supplierid'];
    echo $result['supplierid'];?>">
    <?php echo $query_supplier_name['companyname'];?></a>
    </span><br><?php include "system/php/rating/rating-system.php";?>
    <i><a href="vendor_description.php?vendor_id=<?php 
    $id = $result['supplierid'];
    echo $result['supplierid'];?>" style="font-weight:bolder;text-decoration: none;">Visit Store</a></i>

    <hr>

                     <h4 style="color:gray;">WARRANTY</h4> 
    <?php echo $result['insurance']; ?><br><br>
   


    <div>
        <a href="">
          <button class="yellow-grade" style="margin:5px;padding:10px;"><i class="fa fa-star"></i> Add to wishlist 



          </button>
        </a>
        <button class="yellow-grade" id="contact"  style="margin:5px;padding:10px;"><i class="fa fa-envelope"></i> Contact Seller


        </button>
    </div>

    <form action="" method="get" style="margin-top: 10px;" >
          <span style="font-size: 25px;color:black;margin-left: 10px;margin-right: 10px;"><i class="fa fa-map-marker" aria-hidden="true"></i></span><span style="color:gray;font-size:18px;"> Check Availibility <?php 
           if(isset($_GET['submit']))
                  {
                  
          if($_GET['pincode'] == "")
          {
            $_GET['pincode'] == "";
          }

          echo $_GET['pincode'];
          }
          ?></span>
         
          
          
          <input type="text" name="pincode" class="form-control" style="padding:20px;margin-top: 10px;" placeholder="Enter Your Pincode">
          <input type="submit" name="submit" value="Go" class="round-default" style="padding:10px;margin-top: 10px;font-weight:bold;">
                  <?php
                  if(isset($_GET['submit']))
                  {
                  
                    if($_GET['submit']=="Go")
                    {
                      if($_GET['pincode']=='')
                      {
                        echo "<span style='margin: 1px;font-weight:bold;font-size: 14px;color:red;transform: scale(1.5, 1.5);'>* Required</span>";
                      }
                      else
                      {
                      $check_pincode = "SELECT * FROM `delivery_pincodes` WHERE `pincode` = ".$_GET['pincode']." AND `productid` =".$id." ";
                        $yah = mysqli_query($conn,$check_pincode);
                        $row_cnt = mysqli_num_rows($yah);

         if($row_cnt >= 1)
         {
          echo "<img src='system/media/yes.png' id='pin' width='30px' height='30px' style='margin-top:10px;' title='Available'>";
         }
          else if($row_cnt<=0)
          {
          echo "<img src='system/media/wrong.png' id='pin' width='30px' height='30px' style='margin-top:10px;' title='Not Available'>";
         }   
                    }
                  }
                }
                                             
           ?>
          
          <input type="hidden" name="id" value="<?php echo $result['productid'];?>">

    </form>


    <div style="margin-top: 20px;">


           <b>Delivery :</b><div class="certified">
            <span ><?php echo $result['min_time'];?></span><span > <b> Days</b></span>
           </div>
     

           
     

     
    </div>

            </div>

            </div>

            
              <div class="ibox">
               <div class="ibox-title">
                    <h4>Cart Summary</h4>
                    <hr>
                </div>  
                <div class="ibox-content">
                   <div id="cart">


                   </div>
                  

                </div>

            </div>

            <div class="ibox">

                <div class="ibox-title" >
                  <span style="font-weight: bold;">More Seller</span> 
                  <hr>
                  <?php
                  $get_customer = "SELECT * FROM `customers` WHERE customerid = ".$_SESSION["loggedin"]['id']." ";
                  $get_array = mysqli_query($conn,$get_customer);
                  $get_id = mysqli_fetch_assoc($get_array);

                  echo $get_id['password'];

                  ?>


                </div>
                <div class="ibox-content">
           

              
            </div>
        </div>


            <div class="ibox">

                <div class="ibox-title">
                  <span style="font-weight: bold;">Navigator</span> 
                  <hr>
                </div>
                <div class="ibox-content">
                      <?php 
                      $get_id = $_GET['id'];

                 $sql="SELECT `catagory_id`,`catagory_name`,`description` FROM `catagory` WHERE `catagory_id` = ".$get_id."";
      $query = mysqli_query($conn,$sql);
       $yah=mysqli_query($conn,"SELECT * FROM `food_products` ");
       $count = mysqli_num_rows($yah);
      if($query)
      {
  
   while($result = mysqli_fetch_assoc($query))
        {

           $sql2="SELECT `catagory_name`,`sub_catagory_id` FROM `sub_catagory` WHERE catagory_id = ".$result['catagory_id']." ";
      $query2 = mysqli_query($conn,$sql2);

               if($query2)
        {
        while($result2 = mysqli_fetch_assoc($query2))
        {
          ?>

          <ol class="breadcrumb"> <li>In <a href="#"><?php echo $result['catagory_name'];?></a></li><br>
               <li style="margin-left: 30px;"><a href=""><?php echo $result2['catagory_name'];?></a></li></ol>
          <?php
          break;
       }
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
<div id="ads"></div>
<div class="modal" id="myModal2">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h4 class="modal-title">Have Any Questions? Ask to <a href="vendor_description.php?vendor_id=<?php echo $id;?>">
    <?php echo $query_supplier_name['companyname'];?></a></h4>

        </div>
        <div class="modal-body">
         <textarea class="form-control"></textarea>
        </div>
        <div class="modal-footer">
          
          <a href="#" class="btn btn-warning"  data-dismiss="modal" >Ask</a>
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

.glyphicon-star
{
  color:#ffcc00;
  font-size: 18px;
}
</style>


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



<?php include "system/php/footer/footer.php";?>
<script type='text/javascript' src='system/js/owl.carousel.js'></script>
<script type="text/javascript" src='system/js/custom/owl.js'></script>
<script type="text/javascript">

var page = "desc";
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

  $(document).ready(function(){
    $("#imge").hover(function(){
     alert("Hello");
    });
  });


</script>
</body>
</html>