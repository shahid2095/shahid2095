
<div >


<?php

$pid = $_GET['id'];

 include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
  $sql="SELECT * FROM `cart` order by id desc";
$query = mysqli_query($conn,$sql);

$row_cnt = mysqli_num_rows($query);
$total = 0;





  
           if($query)
           {
             while($result = mysqli_fetch_assoc($query))
             {

     $product_count = "SELECT * FROM `products` WHERE productid = ".$result['productid']."";
     $query_count_product = mysqli_query($conn,$product_count);
     $count_product = mysqli_fetch_assoc($query_count_product);
     $price_count = $count_product['unitprice']*$result['quantity'];
     $supplier = "SELECT `companyname`,`supplierid` FROM `suppliers` WHERE supplierid = ".$count_product['supplierid']."";
     $supplier_name = mysqli_query($conn,$supplier);
     $query_supplier_name = mysqli_fetch_assoc($supplier_name);
     ?>
								<div style="margin-bottom:5px;" class="row">
								<div class="col-md-3 col-sm-6">
     <img src="<?php echo $count_product['small']?>" class="img img-responsive" width="60px" height="60px">

     </div>
     <div class="col-md-9 col-sm-6">
  
     <div class="row" >
    <span style="font-family: 'Open Sans', 'sans-serif';">

    <?php echo $count_product['productname'];?> 

    <a href="system/php/dynamic_cart/regular_product_cart/remove_from_cart_d.php?pid=<?php echo $pid;?>">

                           <span class="glyphicon glyphicon-trash"></span></a>
                           <form id="form-2">
                     
                            
                                 <input type="text"  name="qty" placeholder="<?php echo $result['quantity']."  ";?>"> 
                             
                                   <input type="submit" name="qty" value="update" class="btn btn-default btn-sm">
                             
                           </form>

      
    </span>
    </div>
    <div class='row'>

                             
 
                        </div>
                       

    </div>

                        </div>



     <?php
     $total +=$price_count;
                            }
                        }









?>
                         
					
                         </div>
                         </div>

                         <?php



if($row_cnt>0)
{


echo "<hr>";

?>

<a href="placeorder.php" ><button class="yellow-grade" style="margin-top:2%;">Checkout <i class="fa fa-shopping-cart"></i></button></a>


<?php
echo "<h4>Total<span style='font-size:16;font-weght:bolder;'>   ".number_format($total)."  Rs</span></h4>";

}

if($row_cnt<=0)
{
echo "<h4 style='padding:10%;'><span class='label label-warning center-block'>Your cart is empty</span></h4>";
}

?>


<style type="text/css">
   #form-2 input[type="text"]
    {
        border-style: solid;
        border-width: thin;
        border-radius: 2px;
        max-width: 50px;
        padding: 15px;
        border-color: #f2f2f2;
    }
    .btn-sm
    {
        padding: 5px;
    }
</style>


