<div class='row'>

<div id="owl-demo" class="owl-carousel owl-theme">


    <?php
   
      $sql="SELECT * FROM `products`";
      $query_related_products = mysqli_query($conn,$sql);
     
      if($query)
      {
        while($related_products = mysqli_fetch_assoc($query_related_products))
        {?>
     <div class="item">
     <a href="description.php?id=<?php echo $related_products['productid'];?>">
        <img src="<?php echo $related_products['thumb'];?>" class="img img-responisve" ><br><?php echo $related_products['productname'];?>
    </a>
        </div>


      <?php
      }
      }

      

     ?>

  </div>
 </div>
