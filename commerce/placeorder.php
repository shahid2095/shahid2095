<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">

<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/ssl.php";?>
<link rel="stylesheet" href="/commerce/system/css/custom/radio.css">
<style type="text/css">
	.row
	{
		padding: 0px;
		margin: 0px;
	}
	.order
	{
		background:linear-gradient(#ffb366,#ff9933,#ff8000);
		color: #ffffff;
		border-style: solid;
		border-width: thin;
		border-color: #ff9933;
	}
	.order:hover
	{
		
		color: #ffffff;
	}

	.order:active
	{
		background:linear-gradient(#ffd9b3,#ff9933,#ff8000);
		color: #ffffff;
	}

</style>
</head>
<body>
	
   <h2 style="text-align: center;">
                        Review Your Order & Complete Checkout
                    </h2>
                    <hr/>
<div class="row">
	<div class="col-lg-9">
		

<?php

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
     $order[] = $result['id'];
     ?>
<div style="margin-bottom:5px;" class="row">
    <div class="col-md-3 col-sm-6">
     <img src="<?php echo $count_product['small']?>" class="img img-responsive" width="60px" height="60px">

     </div>
     <div class="col-md-9 col-sm-6">
  
     <div class="row" >
    <span style="font-family: 'Open Sans', 'sans-serif';">

    <?php echo $count_product['productname'];?> <button class="yellow-grade pull-right" style="font-size: 14px;">Qty <?php echo $result['quantity'];?></button>
    
      
    </span>
    </div>
    		<div class='row'>

     <a href="view_products.php?id='<?php echo $query_supplier_name['supplierid'];?>" style='color:#1a8cff;'>
     <?php echo $query_supplier_name['companyname'];?>
     </a><br>
      <?php echo number_format($count_product['unitprice'])." Rs";?>
                             
 
           </div>
                       

    </div>

</div><hr>
<?php

   $total +=$price_count;
                            }
                        }



?>
<div class="pull-right">
     <?php
  


   $draw_fixed_rate_query = "SELECT * FROM `fixed_rates`";
     $draw_fixed_rate_array = mysqli_query($conn,$draw_fixed_rate_query);
     		echo "<b>Total Price </b>".number_format($total)." Rs<hr>";

           if($draw_fixed_rate_array)
           {
           $fixed = 0;
             while($draw_fixed_rate_values = mysqli_fetch_assoc($draw_fixed_rate_array))
             {
				echo "<b>".$draw_fixed_rate_values['name']."</b>";
				?>
			
				<?php
				echo $draw_fixed_rate_values['value']." Rs<hr>";

				$fixed += $draw_fixed_rate_values['value'];
			}

			}

			$grand_total = $total + $fixed;

			echo "<b>Grand Total </b>".number_format($grand_total);


		?>
		</div>

	</div>
	<div class="col-lg-3">

	<h3>DELEVERY ADDRESS</h3><hr>

	<form>
		    <table class="table table-striped" style="font-weight: bold;">
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_email">Best Email:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_email" name="email"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_first_name">First name:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_first_name" name="first_name"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_last_name">Last name:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_last_name" name="last_name"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_address_line_1">Address:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_address_line_1"
                                                           name="address_line_1" required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_address_line_2">Unit / Suite #:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_address_line_2"
                                                           name="address_line_2" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_city">City:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_city" name="city"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_state">State:</label></td>
                                                <td>
                                                    <select class="form-control" id="id_state" name="state">
                                                       
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_postalcode">Postalcode:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_postalcode" name="postalcode"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_phone">Phone:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_phone" name="phone" type="text"/>
                                                </td>
                                            </tr>

                                              <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_phone">Use Default Adress :</label></td>
                                                <td>
                                                      <input type="checkbox" name="default_address">
                                                </td>
                                            </tr>
                                              <tr>
                                               
                                                <td>
                                                 <input type="submit" name="submit" value="Deliver to This Address">
                                                </td>
                                            </tr>
                                           
                                        </table>

                                      
	</form>
		
	</div>



</div>

<hr>
<div class="row">

<div class="col-lg-3"></div>
<div class="col-lg-6 text-center">
<form action="system/general_pages/success.php" method="get">
	<input type="hidden" name="today">
	<input type="hidden" name="row_cnt" value="<?php echo $row_cnt;?>">
	<input type="hidden" name="tax" value="<?php echo $fixed;?>">
	<?php

	for($i=0;$i<$row_cnt;$i++)
		{
		?>
	<input type="hidden" name="order_active_<?php echo $i;?>" value="<?php echo $order[$i];?>">
		<?php
		}

	?>
	<input type="submit" class="order btn btn-lg" name="update" value="PLACE ORDER">
</form>
</div>
<div class="col-lg-3"></div>
	
</div>


</body>
</html>
