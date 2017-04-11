<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8">
<?php  include "header_links.php";?>
<style type="text/css">
	.jumbotron .btn
	{
		margin: 10px;
	}
	.jumbotron
	{
		box-shadow: 0px 0px 1px black;
		padding:1px;
	}

</style>
</head>
<body>
<?php include "admin_header.php";

$get_product = "SELECT * FROM `advertisment`";
$get_query = mysqli_query($conn,$get_product);
?>

<h3>Advertisement Setting's Page </h3>
<hr>
<div class="row container-fluid" >
  <div class="col-lg-3">
  <h3>Advertisement Controls</h3>

<?php
if($get_query)
 {
 while ($get_result = mysqli_fetch_assoc($get_query)) 
 {

?>
<div class="row">
<form method="get" action="php/set_ads.php">
  <input type="hidden" name="page" value="<?php echo $get_result['page']?>">
  <input type="hidden" name="switch" value="<?php echo $get_result['switch']?>">
<span style="font-size: 16;font-weight: bolder;"><?php echo $get_result['name'];?></span>
<button name="submit" class="btn btn-success pull-right"><?php echo $get_result['switch'];?></button>
</form>

<h4>Update timers</h4>
<form method="get" action="">
	 <input type="hidden" name="appear_old" value="<?php echo $get_result['duration_reappear'];?>">
  <input type="hidden" name="reappear_old" value="<?php echo $get_result['duration_appear'];?>">
    <input type="hidden" name="page" value="<?php echo $get_result['page'];?>">
     <input type="hidden" name="link_old" value="<?php echo $get_result['anchor'];?>">
  <div class="row">
  <div class="col-lg-10">
  	<input type="text" class="form-control" name="appear" placeholder="<?php echo $get_result['duration_appear']."  milliSeconds Appear Timer";?>">
  <input type="text" class="form-control" name="reappear" placeholder="<?php echo $get_result['duration_reappear']."  milliSeconds Reappear Timer";?>">
  <input type="text" class="form-control"  name="link" placeholder="<?php echo $get_result['anchor'];?>">
  </div>
  <div class="col-lg-2">
<button name="submit" class="btn btn-success pull-right">Go</button>
  </div>
  
  </div>

</form>


</div>
<hr>
<?php 



    }

  }

?>

</div>
<div class="col-lg-1"></div>
<div class="col-lg-8">
<div class="row">
		<div class="col-lg-4 jumbotron">
			  	<form action="" method="post" enctype="multipart/form-data">
		    <h3>Banner for HomePage:</h3>
		    <input type="file" name="fileToUpload" id="fileToUpload">
		    <input type="hidden" name="page" value="home">
		    <input type="submit" class="btn btn-warning" value="Upload Banner On Home" name="submit">
		    </form>
		</div>
		<div class="col-lg-4 jumbotron">
			  	<form action="" method="post" enctype="multipart/form-data">
		    <h3>Banner for Description page:</h3>
		    <input type="file" name="fileToUpload" id="fileToUpload">
		    <input type="hidden" name="page" value="desc">
		    <input type="submit" class="btn btn-warning" value="Upload Banner On Desc" name="submit">
		    </form>
		</div>
		<div class="col-lg-4 jumbotron">
			  	<form action="" method="post" enctype="multipart/form-data">
		    <h3>Banner for Sort/Filter Page:</h3>
		    <input type="file" name="fileToUpload" id="fileToUpload">
		    <input type="hidden" name="page" value="sort">
		    <input type="submit" class="btn btn-warning" value="Upload Banner On Sort" name="submit">
		    </form>
		</div>

  		</div>
	  		 <hr>
	<div class="row">
		
		<?php

$get_product = "SELECT * FROM `advertisment`";
$get_query = mysqli_query($conn,$get_product);

if($get_query)
 {
 while ($get_result = mysqli_fetch_assoc($get_query)) 
 {

	?>

	<div class="col-lg-4">
	<div style="padding: 5px;">
		<div class="row"><span style="font-size: 18px;font-weight:bolder;"><?php echo $get_result['name']."  Banner";?></span></div>

		
		<hr>
		<img src="<?php echo $get_result['file_path'];?>" class="img img-responsive">	
		<hr>
		<form action="" method="get">
			<input type="hidden" name="file_path" value="<?php echo $get_result['file_path'];?>">
					</form>
		</div>
	</div>


 <?php
    }

  }

?>



	</div>





 	</div>



 </div>
  
</body>
</html>


<?php

if(isset($_POST['submit']))
{
$picture= "uploads/".$_FILES['fileToUpload']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
 


$query = "UPDATE `advertisment` SET `file_path` = '".$picture."' WHERE page = '".$_POST['page']."'";

mysqli_query($conn,$query);

}


if(isset($_GET['submit']))
{
	

	if($_GET['page'] == "home")
	{

	$link = $_GET['link'];
	$appear = $_GET['appear'];
	$reappear = $_GET['reappear'];

		if($link == "")
		{
			$link = $_GET['link_old'];
		}
		if($appear == "")
		{
			$appear = $_GET['appear_old'];
		}
		if($reappear == "")
		{
			$reappear = $_GET['reappear_old'];
		}

		$query = "UPDATE `advertisment` SET `duration_appear` = ".$appear.",`duration_reappear` = ".$reappear.",`anchor`='".$link."' WHERE page = 'home'";

		mysqli_query($conn,$query);

	}

	if($_GET['page'] == "desc")
	{
	$link = $_GET['link'];
	$appear = $_GET['appear'];
	$reappear = $_GET['reappear'];

		if($link == "")
		{
			$link = $_GET['link_old'];
		}
		if($appear == "")
		{
			$appear = $_GET['appear_old'];
		}
		if($reappear == "")
		{
			$reappear = $_GET['reappear_old'];
		}

		$query = "UPDATE `advertisment` SET `duration_appear` = ".$appear.",`duration_reappear` = ".$reappear.",`anchor`='".$link."' WHERE page = 'desc'";

		mysqli_query($conn,$query);
	}

	if($_GET['page'] == "sort")
	{
	$link = $_GET['link'];
	$appear = $_GET['appear'];
	$reappear = $_GET['reappear'];

		if($link == "")
		{
			$link = $_GET['link_old'];
		}
		if($appear == "")
		{
			$appear = $_GET['appear_old'];
		}
		if($reappear == "")
		{
			$reappear = $_GET['reappear_old'];
		}

		$query = "UPDATE `advertisment` SET `duration_appear` = ".$appear.",`duration_reappear` = ".$reappear.",`anchor`='".$link."' WHERE page = 'sort'";

		mysqli_query($conn,$query);
		
	}



}
?>