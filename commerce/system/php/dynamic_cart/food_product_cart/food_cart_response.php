
<?php

include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";

  $sql="SELECT * FROM `food_cart` order by id desc";
  $query = mysqli_query($conn,$sql);
  $cnt = mysqli_num_rows($query);
  $total = 0;
        if($cnt<=0)
        {
        echo "<h4><span class='label label-warning'>Your cart is empty</span></h4>";
        }

  
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {

$product_count = "SELECT * FROM `food_products` WHERE id = ".$result['productid']."";
$query_count_product = mysqli_query($conn,$product_count);
while($count_product = mysqli_fetch_assoc($query_count_product))
{
?>
      <div class="row">
                						
          <div class="col-xs-7"><?php echo $count_product['name'];?><span style="font-size: 14px;color: gray;"> x <?php echo $result['quantity'];

          $price_count = $count_product['price']*$result['quantity'];


          ?> Unit</span><span style="font-size: 12px;color: green;"><?php echo "   ".number_format($price_count);?> Rs</span></div> 
          <div class="col-xs-5">
          <a href="system/php/dynamic_cart/food_product_cart/food_remove_from_cart.php?id=<?php echo $result['productid'];?>" style="font-size: 10px;color: gray;">Remove</a>
          </div></div>

      <?php
      $total +=$price_count;
      }
    }
}
echo "<hr>";
echo "<h4>Total<span style='font-size:16;font-weght:bolder;'>   ".number_format($total)."  Rs</span></h4>";







?>
 
					
 