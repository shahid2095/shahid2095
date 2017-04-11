<meta charset="utf-8">


  <nav class="navbar navbar-default" style="margin-bottom: 0px;background-color: #ffffff;">

    <div class="collapse navbar-collapse js-navbar-collapse">

      

        <form action="view_products.php" method="get">
            <div class="row" style="margin-bottom: 5px;">
                    <div class="col-lg-1 col-md-1 col-sm-1 com-xs-1"></div>
                      <div class="col-lg-9 col-md-9 col-sm-9 com-xs-9" style="padding-right: 0px;margin-right: 0px;">
                <input type="text"  name="searchkey" autocomplete="off" placeholder="Search Stepdoor..." id='search' class="form-control" name="">
                        <input type="hidden" name="id" value="1">
                        <input type="hidden" name="id2" value="1">
                      </div>
          <div class="col-lg-2 col-md-2 col-sm-2 com-xs-2" style="padding-left: 0px;margin-left: 0px;">
                       <button type="submit" class="btn btn-warning" class="yellow-grade">
                  <span class="glyphicon glyphicon-search"></span>
                </button>

                <span class="span" style="padding:5px;border-style: solid;border-width:thin;border-color: white;margin-left: 5px;border-radius: 2px;box-shadow: 0px 0px 5px white;">
                <a href="login.php" style="text-decoration: none;">Sign in</a>
                </span>

                <span class="span" style="padding:5px;border-style: solid;border-width:thin;border-color: white;margin-left: 5px;border-radius: 2px;box-shadow: 0px 0px 5px white;">
                <a href="" style="text-decoration: none;">Wishlist</a>
                </span>
              </div>

           </div>
            
          
        </form>






</div>
<div style="margin-left: 20%;" id="menu-link">
                <a href="index.php" class="menu-a">Home</a>

                  <a href="food_store.php" class="menu-a">Order food </a>

                <a href="g_store.php" class="menu-a">Order Groceries </a>

                <a href="" class="menu-a">Deals & Offers </a>
</div>

        <li class="dropdown mega-dropdown" style="list-style: none;">

          <a href="#" class="dropdown-toggle " id='collect' style="margin:20px;font-family: 'Open Sans', 'sans-serif';" data-toggle="dropdown">Collection</a>

               
            
          
                 <ul class="dropdown-menu mega-dropdown-menu row">
                      <li class="col-sm-3">
                        <ul>
                          <li class="dropdown-header" id="new_">New in Stores</li>
                          <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <div class="item active">
                                <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                                <h4><small>Summer dress floral prints</small></h4>
                                <button class="btn btn-primary" type="button">49,99 €</button>
                                <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                              </div>
                              <!-- End Item -->
                              
                            </div>
                            <!-- End Carousel Inner -->
                          </div>
                          <!-- /.carousel -->
                          <li class="divider"></li>
                          <li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                      </ul>
                    </li>

            
     
         
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
          <li class="col-sm-3"><ul>
          <li class="dropdown-header"><a href="view_products.php?id=<?php echo $result['catagory_id'];?>" ><?php echo $result['catagory_name'];?></a> 
          </li>
          
                
              <?php
               if($query2)
        {
        while($result2 = mysqli_fetch_assoc($query2))
        {
          ?>
             
                <li><a href="view_products.php?id=<?php echo $result['catagory_id'];?>&id2=<?php echo $result2['sub_catagory_id'];?>"><?php echo $result2['catagory_name'];?></a></li>
              
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

 

  </nav>





  <div class="row" >
<div class="col-lg-1 col-md-1 col-sm-1 com-xs-1"></div>
<div class="col-lg-9 col-md-9 col-sm-9 com-xs-9" >

<div id="result" style="position:relative;top:5%;z-index: 1000;width:100%;height: 300px;background-color: #ffffff;box-shadow:0px 0px 3px gray ;display:none;">
     
   </div>
 
</div>

<div class="col-lg-2 col-md-2 col-sm-2 com-xs-2"></div>

</div>



<script type="text/javascript">
  
$(document).ready(function(){

  

  $("#search").keyup(function(){

    var term = $("#search").val();



      if(term == '')
      {
         $("#result").css("display","none");
      }
      if(term != null)
      {


    $.get("system/ajax/ajax-search.php",{searchkey:term},function(data){
      $("#result").html(data);
    });
    $("#result").css("display","block");



    $("body").click(function(){
      $("#result").css("display","none");

    });

      }
  });

 $('html').keyup(function(e){if(e.keyCode == 8)
  {
    $("#result").css("display","none");
  }
});
});


</script> 

