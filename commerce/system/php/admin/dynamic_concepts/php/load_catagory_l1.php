 

 <?php

      $sql="SELECT `catagory_id`,`catagory_name`,`description` FROM `catagory`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {?>
          <li><?php echo $result['catagory_name'];?></li>
        <?php
      }
      }

     ?>

