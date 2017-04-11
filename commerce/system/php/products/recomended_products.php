<?php include "system/php/general/count-values.php";?>

<div class='row'>

<div id="owl-demo_2" class="owl-carousel owl-theme">


    <?php
   
      $sql="SELECT * FROM `products`";
      $query_recommended_products = mysqli_query($conn,$sql);
     
      if($query)
      {
        while($recommended_products = mysqli_fetch_assoc($query_recommended_products))
        {?>
     <div class="item">
 

 <div class="panel widget" style="margin-bottom: 10px;">
      
         <div class="half-float gallery">
            <a href="description.php?id=<?php echo $recommended_products['productid'];?>"><img src="<?php echo $recommended_products['thumb'];?>" alt="" class="img" > 
              <?php
              $unitprice = $recommended_products['unitprice'];
              $discountprice = $recommended_products['discount'];

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
              <a href="product-desc.php?id=<?php echo $recommended_products['productid'];?>" style="font-size: 16px;font-weight: bold;" >
              <?php echo $recommended_products['productname'];?>
                
              </a>
            </h3>
            <p class="text-muted">Our Price :
            <?php echo "  ".number_format($recommended_products['discount']);?>  Rs</p>

            <del>
              <p class="text-muted">Price :
              <?php echo "  ".number_format($recommended_products['unitprice']);?>  Rs</p>
            </del>

            <span style="color: gray;font-size: 12px;">You save :
            <?php echo number_format($priceoff);?>  Rs</span><br>
            <span>
              <a href="vendor_description.php?vendor_id=<?php echo $recommended_products['supplierid'];?>" style="color: #cc5200;">
        
         </div>
         <div class="panel-body text-center bg-gray-dark">
            <div class="row row-table">
              
            

          
            </div>
         </div>



        </div>
</div>

      <?php
      }
      }

      

     ?>

  </div>
 </div>
