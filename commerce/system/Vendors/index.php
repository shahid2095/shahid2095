<!DOCTYPE html>
<html>
<head>
	<title></title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="/commerce/system/css/custom/vendors.css">
<link rel="stylesheet" href="/commerce/system/css/custom/luminous_buttons.css">
<link rel="stylesheet" href="/commerce/system/css/custom/vendor-my.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
<?php include "vendor_header.php";?>

<div class="row">
	<div class="col-md-2">

		<div class="ibox">
				<div class="ibox-title">
				<div class="my-title">Orders </div>
				<hr>
					
				</div>

				<div class="ibox-content">

				<div class="gen-text">Order's Today</div>
				<hr>

				<h1>16<span class="status"> New Orders</span></h1>
				<hr>
				<div class="gen-text">Todays Earnings</div>

				<hr>
				<h1>13,220 Rs</h1>
				<hr>
				<div class="gen-text">Last 7 Days Earnings</div>
				<hr>
				<h1>17,220 Rs</h1>
				<hr>
				<div class="gen-text">Last 30 Days Earnings</div>
				<hr>
				<h1>18,220 Rs</h1>
				
				</div>

	
		</div>


	</div>
	<div class="col-md-8">
<div class="ibox">

				<div class="ibox-title">

				<div class="my-title2">Your best selling products</div>
				<hr>
					
				</div>

		<div class="ibox-content">
			<div class="row">

			 <?php
		       $yah=mysqli_query($conn,"SELECT * FROM `products` LIMIT 0,4");
		           if($yah)
		                {
		 while($result=mysqli_fetch_assoc($yah))
		                  {
				?>
				<div class="products col-md-3">

				<a href="../../../../description.php?id=<?php echo $result['productid'];?>"><img src="../../<?php echo $result['thumb'];?>"></a><br>
				<b><?php echo $result['productname'];?></b><br>
				<?php echo $result['unitprice']." Rs";?>
			</div>

		<?php
		  					}
						}
		                       
		?>



			</div>

		</div>
			
		
				<div class="ibox-title">

				<div class="my-title2">Other products similar to your top products</div>
				<hr>
					
				</div>

		<div class="ibox-content">
			<div class="row">

			 <?php
		       $yah=mysqli_query($conn,"SELECT * FROM `products` 1,4");
		           if($yah)
		                {
		 while($result=mysqli_fetch_assoc($yah))
		                  {
				?>
				<div class="products col-md-3">

				<a href="../../../../description.php?id=<?php echo $result['productid'];?>"><img src="../../<?php echo $result['thumb'];?>"></a><br>
				<b><?php echo $result['productname'];?></b><br>
				<?php echo $result['unitprice']." Rs";?>
			</div>

		<?php
		  					}
						}
		                       
		?>



			</div>

		</div>

		<div class="ibox-title">

				<div class="my-title2">Notifications from admin</div>
				<hr>
					
				</div>

		<div class="ibox-content">
			<div class="row ">

			 <?php
		       $yah=mysqli_query($conn,"SELECT * FROM `log_table`");
		           if($yah)
		                {
		 while($result=mysqli_fetch_assoc($yah))
		                  {
				?>
				<div class="products col-md-12 text-notify">

				
				<b><?php echo $result['event'];?></b><br>
				<?php echo $result['user_id']." Rs";?>
			</div>

		<?php
		  					}
						}
		                       
		?>



			</div>

		</div>
			
		</div>




			</div>
			<div class="col-md-2">
				<div class="ibox">


		<div class="ibox-content">

		</div>
			
		</div>
	</div>
</div>


	
</div>




</body>
</html>