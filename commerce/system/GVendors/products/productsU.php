<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Control Panel</title>
<link rel="stylesheet" href="/commerce/system/css/custom/pagination.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style type="text/css">
   input::-webkit-input-placeholder {
   color: #ff8566;
   font-size: 14px;
   
   font-weight: bold;
}

input::-moz-placeholder { /* Firefox 18- */
color: #ff8566;
   font-size: 14px; 
   
   font-weight: bold;
}

input::-moz-placeholder {  /* Firefox 19+ */
  color: #ff8566;
   font-size: 14px;
   
   font-weight: bold;
}

input::-ms-input-placeholder {  
   color: #ff8566;
   font-size: 14px;
   
   font-weight: bold;
}
tr
{
  box-shadow:0px 0px 2px #808080;
  padding:5px;
  background:linear-gradient(#ffffff,#f2f2f2);
}
tr th
{
   background:linear-gradient(#ffffff,#f2f2f2,#e6e6e6,#bfbfbf);

}
tr th thead
{
  padding:10px;
}

input[type='text']
{
  box-shadow:0px 0px 1px #808080;
  padding:6px;
  margin-bottom: 2px;
  width: 100%;
  background:linear-gradient(#ffffff,#f2f2f2);
  border-style: solid;
  border-width: thin;
}
    </style>
</head>
<body>
<?php  include "vendor_header.php";?>
<div class="container-fluid">
<?php
 
    $query = mysqli_query($conn,"SELECT * FROM products");
?>
  
<form name="bulk_action_form" action="" method="post" onsubmit="return deleteConfirm();"/>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
        <th><input type="checkbox" name="select_all" id="select_all" value=""/></th>        
        
       
        <th>  Product name</th>
        <th>  Supplier </th>
        <th>Category id</th>
        <th>Quantity per unit</th>
        <th>Unit price</th>
        <th>  Msrp</th>
        <th>Discount</th>
        <th>Units in Stock</th>
        <th>  Units on Order</th>
        <th>  Product available</th>
        <th>  Discount available</th>
       
        <th>  Ranking</th>
        <th>  Min_time</th>
      </tr>
    </thead>
    <tbody>
        </tr>
        </thead>
        <?php
            if(mysqli_num_rows($query) > 0){
                while($result = mysqli_fetch_assoc($query)){
                        $supplier = "SELECT `companyname` FROM `suppliers` WHERE supplierid = ".$result['supplierid']."";
                        $supplier_name = mysqli_query($conn,$supplier);
                        $query_supplier_name = mysqli_fetch_assoc($supplier_name);

        ?>
        <tr>
        <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $result['productid']; ?>"/></td>
       <td><input type="text" name="name" placeholder="<?php echo $result['productname'];?>"></td>
       <td><input type="text" value="<?php echo $query_supplier_name['companyname'];?>"></td>
       <td><input type="text" value="<?php echo $result['categoryid'];?>"></td>
       <td><input type="text" name="qntyperunit" placeholder="<?php echo $result['quantityperunit'];?>"></td>
       <td><input type="text" name="price" placeholder="<?php echo $result['unitprice'];?>"></td>
       <td><input type="text" name="mrp" placeholder="<?php echo $result['msrp'];?>"></td>
       <td><input type="text" name="discount" placeholder="<?php echo $result['discount'];?>"></td>
       <td><input type="text" name="stock" placeholder="<?php echo $result['unitsinstock'];?>"></td>
       <td><input type="text" name="unitonorder" placeholder="<?php echo $result['unitsonorder'];?>"></td>
       <td><input type="text" name="productavailable" placeholder="<?php echo $result['productavailable'];?>"></td>
       <td><input type="text" name="discountavailable" placeholder="<?php echo $result['discountavailable'];?>"></td>
       <td><input type="text" name="ranking" placeholder="<?php echo $result['ranking'];?>"></td>
       <td><input type="text" name="min_time" placeholder="<?php echo $result['min_time'];?>"></td>
        </tr> 
        <?php 
                } 
            }
        else
        { 
            ?>
            <tr><td colspan="5">No records found.</td></tr> 
        <?php } ?>
    </table>
    </div>
    <input type="submit" class="btn btn-danger" name="bulk_update_submit" value="Update"/>
</form>
<?php

if(isset($_GET['status']))
{
  echo $_GET['status'];
}

?>
</div>
 <script type="text/javascript">
function deleteConfirm(){
    var result = confirm("Are you sure to update users?");
    if(result){
        return true;
    }else{
        return false;
    }
}

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>

</body>
</html>


<?php

   
    if(isset($_POST['bulk_update_submit'])){
        $idArr = $_POST['checked_id'];
        foreach($idArr as $id){
            mysqli_query($conn,"DELETE FROM products WHERE productid=".$id);
        }
        $msg = 'product have been updated successfully.';
        header("location:productsU.php?status=".$msg."");
    }

?>
