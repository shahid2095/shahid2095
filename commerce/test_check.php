
<div id="gallery">


<?php
$id = 13;

 include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
  $sql="SELECT * FROM `products` WHERE productid = ".$id."";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($query);


     
?>
<?php echo $result['productname'];?>
        <img src="<?php echo $result['small'];?> ">
<?php



?>

</div>