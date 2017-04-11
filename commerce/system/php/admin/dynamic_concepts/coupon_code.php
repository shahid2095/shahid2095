<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Control Panel</title>
<link rel="stylesheet" href="/commerce/system/css/custom/luminous_buttons.css">
<link rel="stylesheet" href="/commerce/system/css/custom/pagination.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script>
  </script>

</head>
<body>
  <?php include "admin_header.php";?>



<style type="text/css">
	input[type='text']
	{
		padding: 10px 20px;
	}
	input
	{
		margin:2px;
	}
</style>

<div class="row">
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";?>
	<div class="col-md-6">
		<h2>Generate Coupon</h2>
			<form action="generate_coupons.php" method="get">
			<div class="row"><input type="text" class="form-control" name="price" placeholder="Enter price of Coupon in Rs"></div>
			<div class="row"><input type="text" class="form-control" name="quantity" placeholder="How many times usable?"></div>
			<div class="row"><input type="date" class="form-control" name="fromdate" placeholder="active from date"></div>
			<div class="row"><input type="date" class="form-control" name="tilldate" placeholder="active till date"></div>
			
			<input type="submit" name="submit" value="Create Coupon" >
			</form>

			<h2>Set Credit Points</h2>
			<form action="set_credit_point.php" method="get">
			<div class="row">
			<div class="col-md-6">
				<input type="text" class="form-control" name="credit" placeholder="Enter Credit">
			</div>
			<div class="col-md-6">
				<input type="text" class="form-control" name="price" placeholder="Price">
			</div>
			
			</div>
			
			<input type="submit" name="submit" value="Create Credit" >
			</form>

			<h2>Present Point Rate </h2>
	<?php
	$query = "SELECT * FROM `points`";
	$grab_rate = mysqli_query($conn,$query);

	$rate=mysqli_fetch_assoc($grab_rate);
	?>
	<table class="table table-bordered">
		<tr>
		<td><?php echo $rate['points']." Points";?></td>
		<td><?php echo $rate['price_rate']." Rs";?></td>
		</tr>
	</table>
	


	</div>
<div class="col-md-6">
<form >
	<div class="row">

	<div class="col-md-9">
		<input type="text" class="form-control" name="search-term">
	</div>
	<div class="col-md-3">
		<select name="table_name" style="padding: 8px;" id="table_name">
			<option>Select Filter</option>
			<option value="file_name">Name</option>
			<option value="price">Price</option>
			<option value="generated_time">Time</option>
			<option value="code">Code</option>
			<option value="activefrom">Active From</option>
			<option value="activetill">Expire On</option>
		</select>
		</div>
	</div>
	</form>


<table class="table table-bordered">
<thead>
	<tr>
		<td>id</td>
		<td>Name</td>
		<td>Code</td>
		<td>price</td>
		<td>Uses</td>
		<td>Usable</td>
		<td>Created On</td>
		<td>Active From</td>
		<td>Expire on</td>
	</tr>
</thead>
<tbody>
	<?php
	$query = "SELECT * FROM `coupon_codes`";
	$grab_coupons = mysqli_query($conn,$query);

	if($grab_coupons)
	{
		while($coupons=mysqli_fetch_assoc($grab_coupons))
		{
			?>
			<tr>
				<td><?php echo $coupons['id'];?></td>
				<td><img src="<?php echo $coupons['path'];?>"></td>
				<td><?php echo $coupons['file_name'];?></td>
				<td><?php echo $coupons['price']." Rs";?></td>
				<td><?php echo $coupons['used'];?></td>
				<td><?php echo $coupons['usable'];?></td>
				<td><?php echo $coupons['generated_time'];?></td>
				<td><?php echo $coupons['activefrom'];?></td>
				<td><?php echo $coupons['activetill'];?></td>
			</tr>

		<?php
		}
	}


	?>
	</tbody>

</table>

</div>

	
</div>


</body>

</html>





