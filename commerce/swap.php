<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="system/css/bootstrap.min.css">
	<link rel="stylesheet" href="system/css/w3.css">
  <script src="system/js/jquery311.js"></script>
  <script src="system/js/bootstrap.min.js"></script>
</head>
<body>



<div class="w3-container w3-green">
  <h2>ENTER MENU ITEMS</h2>
</div>

<form action="" method="post" enctype="multipart/form-data">
	<input type="text" class="w3-input" name="entry">
	<input type="hidden" name="supplier_id" value="0">

    <button class="w3-btn w3-blue">Register</button>



</form>




</body>
</html>






<?php  
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/php_plugin/php_image_magician.php";
if(isset($_POST['submit']))
{

$entry = $_POST['entry'];
$active = 0;

if($_POST['supplier_id'] == "")
{
	$_POST['supplier_id'] = 0;
}



$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

$image ="uploads/".$_FILES['fileToUpload']['name'];

   $magicianObj = new imageLib($target_file);

    $magicianObj -> resizeImage(890, 154,'landscape', false);

    $magicianObj -> saveImage('uploads/'.$_FILES['fileToUpload']['name'], 100);



$menu_entry = "INSERT INTO `food_menu`(`name`, `supplier_id`, `active`,`image_path`)
 VALUES ('".$entry."',".$_POST['supplier_id'].",".$active.",'".$image."')";
mysqli_query($conn,$menu_entry);



}
?>