<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/ssl.php";?>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/header.php";?>

<div  style="margin-top: 100px;">



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
          <li class="col-lg-3">
          	<ul id="main_ul">
          		<li id="first_li">
          			<a href="view_products.php?id=<?php echo $result['catagory_id'];?>" >
          				<?php echo $result['catagory_name'];?>
          			
          			</a> 
          		</li>
          			
            
                
              <?php
               if($query2)
        {
        while($result2 = mysqli_fetch_assoc($query2))
        {
          ?>
             
                <li id="second_li">
                	<a href="view_products.php?id=<?php echo $result['catagory_id'];?>&id2=<?php echo $result2['sub_catagory_id'];?>">
                		<?php echo $result2['catagory_name'];?>
                	
                	</a>
                </li>
              
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
	
</div>
  
  <style type="text/css">
  	ul,li
  	{
  		list-style: none;
  	}
  	
  	#main_ul li a
  	{
  		text-decoration: none;

  	}

  	#main_ul #first_li a
  	{
  		font-size: 20px;
  		color: #e67300;

  	}

  	#main_ul #second_li a
  	{
  		margin-left: 10px;
  		text-decoration:underline;
  	}

  </style>         





</body>
</html>