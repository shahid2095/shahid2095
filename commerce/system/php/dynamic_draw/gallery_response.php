
<div id="gallery">


<?php
$id = $_GET['id'];

 include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
  $sql="SELECT * FROM `products` WHERE productid = ".$id."";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($query);
    ?>
        <h4>Main Image</h4>
        <img src="../../../../<?php echo $result['small'];?> "> 
        
<?php

     $product_count = "SELECT * FROM `media_sm` WHERE productid = ".$id."";
     if($query_count_product = mysqli_query($conn,$product_count))
     {
        while($count_product = mysqli_fetch_assoc($query_count_product))
        {
     
?>

<?php
        }
    }



?>


</div>