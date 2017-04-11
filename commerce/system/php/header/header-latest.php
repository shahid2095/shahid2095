
<div class="navbar navbar-default navbar-fixed-top" style="min-height: 10%;">
      <div class="container">
      
			<ul class="nav navbar-nav">
		
			<li class="dropdown menu-large">
				<a href="index.php" style="">Categories</a>				
				<ul class="dropdown-menu megamenu row">
					 <?php
              include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
                

                 $sql="SELECT `catagory_id`,`catagory_name`,`description` FROM `catagory`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {
      $sql2="SELECT `catagory_name`,`sub_catagory_id` FROM `sub_catagory` WHERE catagory_id = ".$result['catagory_id']." ";
      $query2 = mysqli_query($conn,$sql2);


          ?> 
          <li class="col-sm-4 main-block">
          	<ul>
          		<li style="padding:0px;" class="dropdown-header"><a href="view_products.php?id=<?php echo $result['catagory_id'];?>" ><?php echo $result['catagory_name'];?></a> 
          			</li>
          			
            
                
              <?php
               if($query2)
        {
        while($result2 = mysqli_fetch_assoc($query2))
        {
          ?>
             
                <li class="sub_links"><a href="view_products.php?id=<?php echo $result['catagory_id'];?>&id2=<?php echo $result2['sub_catagory_id'];?>"><?php echo $result2['catagory_name'];?></a></li>
              
              <?php 
            }
            }

            ?>
            </ul>
           </li>
        <?php
      }
      }
?>
					
				</ul>

			</li>


			<li id="searchbar">
				<div class="row">
					<div class="col-md-11" style="padding-right: 0px">
          <form action="view_products.php" method="get">
						<input type="text" class="form-control" name="searchkey" >
					</div>
					<div class="col-md-1" style="padding-left: 0px">
						<button  style="padding:4px 8px;" class="yellow-grade"><span class="glyphicon glyphicon-search"></span></button>
            </form>
					</div>
				</div>
			</li>
				


<div style="margin-left: 20%;" id="menu-link">
                <a href="index.php" class="menu-a">Home</a>

                  <a href="food_store.php" class="menu-a">Order food </a>

                <a href="g_store.php" class="menu-a">Order Groceries </a>

                <a href="" class="menu-a">Deals & Offers </a>

</div>
   <div class="row">
      <span class="pull-right">
                <a href="login.php" style="text-decoration: none;">Sign in</a>
                </span>

                <span class="pull-right">
                <a href="" style="text-decoration: none;">Wishlist</a>
                </span>
                
   </div>


		</ul>
		</div>
      </div>
