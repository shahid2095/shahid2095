<?php

 include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/php_plugin/php_image_magician.php";
$linked_pid  = $_POST['pname'];
$productname  = $_POST['productname'];
$productdescription  = $_POST['description'];

$categoryid  = $_POST['categoryid'];
$quantityperunit  = $_POST['quantityperunit'];
$unitprice  = $_POST['unitprice'];
$msrp  = $_POST['msrp'];

$attribute = $_POST['attribute'];

$attri_value = $_POST['attri_value'];


$unitsinstock  = $_POST['unitsinstock'];

$active = 0;


if($_POST['sku']=="")
{
       

}
else
{
    $sku  = $_POST['sku'];
}

if($_POST['supplierid']=="")
{
    $supplierid = 1;
}
else
{
    $supplierid  = $_POST['supplierid'];
}



if($_POST['size']=="")
{
    $size = 0;
}
else
{
    $size  = $_POST['size'];
}

if($_POST['color']=="")
{
    $colors = "none";
}
else
{
    $colors  = $_POST['color'];
}

if($_POST['discount']=="")
{
    $discount = 0;
}
else
{
    $discount  = $_POST['discount'];
}

if($_POST['unitweight']=="")
{
    $unitweight = 0;
}
else
{
    $unitweight  = $_POST['unitweight'];
}


if($_POST['unitsonorder']=="")
{
    $unitsonorder = 1;
}
else
{
    $unitsonorder  = $_POST['unitsonorder'];
}


if($_POST['productavailable']=="")
{
    $productavailable = "yes";
}
else
{
$productavailable  = $_POST['productavailable'];
    
}

if($_POST['discountavailable']=="")
{
    $discountavailable = 1;
}
else
{
$discountavailable  = $_POST['discountavailable'];
    
}



$ranking = 0;



if($_POST['note']=="")
{
    $note = "Supplier provided no note";
}
else
{
$note  = $_POST['note'];
    
}

if($_POST['min_time']=="")
{
    $min_time = 10;
}
else
{
    
$min_time  = $_POST['min_time'];
}

if($_POST['max_time']=="")
{
    $max_time = 30;
}
else
{
    
$max_time = $_POST['max_time'];
}

if($_POST['type']=="")
{
    $type = "";
}
else
{
    
$type = $_POST['type'];
}


$i = substr($_FILES['fileToUpload']['name'],0,1);
$picture= "system/media/index/".$i."/originals/".$_FILES['fileToUpload']['name'];
$target_dir = "../../../../../system/media/index/".$i."/originals/";
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
 
$thumb ="system/media/index/".$i."/thumb/".$_FILES['fileToUpload']['name'];
$small ="system/media/index/".$i."/small/".$_FILES['fileToUpload']['name'];
   $magicianObj = new imageLib($target_file);

    $magicianObj -> resizeImage(390, 274,'landscape', false);

    $magicianObj -> saveImage('../../../../../system/media/index/'.$i.'/thumb/'.$_FILES['fileToUpload']['name'], 100);

    $magicianObj = new imageLib($target_file);

    $magicianObj -> resizeImage(100, 67,'landscape', false);

    $magicianObj -> saveImage('../../../../../system/media/index/'.$i.'/small/'.$_FILES['fileToUpload']['name'], 100);



$query = "INSERT INTO `linked_products`(`linked_productid`,`sku`, `productname`, `productdescription`, `supplierid`, `categoryid`, `quantityperunit`, `unitprice`, `msrp`, `size`, `colors`, `discount`, `unitweight`, `unitsinstock`, `unitsonorder`, `productavailable`, `discountavailable`, `picture`, `ranking`, `note`, `min_time`, `max_time`, `type`,`thumb`,`small`,`attribute`,`attri_value`) VALUES (
'".$linked_pid."',
'".$sku."',
'".$productname."',
'".$productdescription."',
'".$supplierid."',
'".$categoryid."',
'".$quantityperunit."',
'".$unitprice."',
'".$msrp."',
'".$size."',
'".$colors."',
'".$discount."',
'".$unitweight."',
'".$unitsinstock."',
'".$unitsonorder."',
'".$productavailable."',
'".$discountavailable."',
'".$picture."',
'".$ranking."',
'".$note."',
'".$min_time."',
'".$max_time."',
'".$type."',
'".$thumb."',
'".$small."',
'".$attribute."',
'".$attri_value."'
)";

mysqli_query($conn,$query);

echo mysqli_error($conn);

?>