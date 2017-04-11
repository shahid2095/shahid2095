<!DOCTYPE html>
<html>
<head>
	<title></title>

<?php  include "header_links.php";?>
<style type="text/css">
	#info
	{
		
		margin-top: 50px;
		box-shadow: 0px 0px 10px gray;
		padding: 20px;
		font-size: 15px;
		width: 20%;
	}

	.header
	{
		position: absolute;
		left: 33%;
	}
	.form
	{

		border-style: solid;
		border-width: thin;
		border-color:#d9d9d9;
		padding: 20px;

		position: absolute;
		width: 30%;
		top: 15%;
		left: 30%;
	}
	form
	{
		border-bottom-style: solid;
		border-width: thin;
		border-color:#999999;
		padding-bottom: 10px;
	}
	input
	{
		margin-top: 10px;
		border-style: solid;
		border-width: thin;
		border-color: #f2f2f2;
		border-radius: 3px;
		padding: 5px;
	}
	select
	{
		margin-top: 5px;
	}
</style>

</head>
<body >
<?php include "admin_header.php";?>
<h3 class="header">
<span style="color: red;opacity: 0.7;">Waring !</span>Critical Change, All Existing images will Not be effected
</h3>
<hr>
<div class="form" align="center">
<div class="row" style="">


	

<form action="php/image_setting.php" method="get"  name="form_medium">
	<h4>Medium Image Setting's</h4><hr>
<input type="text" name="width" placeholder="Image width ration"><br>
<input type="text" name="height" placeholder="Image height ration"><br>
<select name="type">
	<option value="landscape">landscape</option>
	<option value="portrait">portrait</option>
	<option value="crop">crop</option>
	<option value="auto">auto</option>
</select><br>

<input type="submit" name="submit" class="btn btn-default" value="medium">

</form>
<form action="php/image_setting.php" method="get" name="form_small">

<h4>Small Image Setting's</h4><hr>
	
<input type="text" name="width" placeholder="Image width ration"><br>
<input type="text" name="height" placeholder="Image height ration"><br>
<select name="type">
	<option value="landscape">landscape</option>
	<option value="portrait">portrait</option>
	<option value="crop">crop</option>
	<option value="auto">auto</option>
</select><br>

<input type="submit" name="submit" class="btn btn-default" value="small">

</form>
<form action="php/image_setting.php" method="get" style="border-style: none;"  name="form_thumb">
	<h4>Thumb Image Setting's</h4><hr>
<input type="text" name="width" placeholder="Image width ration"><br>
<input type="text" name="height" placeholder="Image height ration"><br>
<select name="type">
	<option value="landscape">landscape</option>
	<option value="portrait">portrait</option>
	<option value="crop">crop</option>
		<option value="auto">auto</option>
</select><br>

<input type="submit" name="submit" class="btn btn-default" value="thumb">

</form>

</div>
		

		
	</div>

<div id="info">

	<h3>Present Data Table</h3>
	<hr>
	<table class="table">
	<thead>
	<tr>
		<td>Variable</td>
		<td>type</td>
		<td>width</td>
		<td>height</td>
	</tr>
	</thead>
<?php


       $yah=mysqli_query($conn,"SELECT * FROM `image_mag`");

           if($yah)
                {
                  while($show=mysqli_fetch_assoc($yah))
                  {
                    ?>
          <tr>
          	<td><?php echo $show['name'];?></td>
          	<td><?php echo $show['type'];?></td>
          	<td><?php echo $show['width'];?></td>
          	<td><?php echo $show['height'];?></td>

          </tr>
          

          			<?php
            }
        }


                    ?>
                    </table>
</div>

<div id="info">
<h3>Resize</h3>
<hr>
The resize method allows you to resize your images in a variety of ways, depending on your needs. Firstly, you can resize an image to an exact width and height. This is useful if you know the original image ratio, otherwise distortion will occur.

A solution to preventing distortion is to use one of the resizing options such as landscape or portrait. The landscape option will resize the image to the width you specify and the height will be calculated automatically to maintain the image proportions. The Portrait option is the same but it's the height you specify that is used while the width is calculated.

auto mode will determine the images orientation and resize the image appropriately using either landscape or portrait automatically.

Crop will resize the image as close as it can to the size you specified, while still maintaining the aspect ratio, then crop the rest. This is extremely useful for creating images, such as thumbnails, that are all the same size and don't have distortion!

</div>

</body>
</html>
