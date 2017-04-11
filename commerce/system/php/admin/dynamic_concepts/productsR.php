<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Control Panel</title>

<?php include "header_links.php";?>
     <style type="text/css">
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

<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";?>
<?php include "admin_header.php";?>
<div class="container-fluid">
<?php
    $start=0;
$limit=10;

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $start=($id-1)*$limit;
}
else
{
    $id=1;
}

$query = mysqli_query($conn,"SELECT * FROM products LIMIT ".$start.", ".$limit."");

?>
  
<form name="bulk_action_form" action="" method="post" onsubmit="return deleteConfirm();"/>
    <table class="table">
        <thead>
        <tr>
            <th><input type="checkbox" name="select_all" id="select_all" value=""/></th>        
        
        <th>  Product id</th>
         <th>Picture</th>
        <th>Sku</th>
        <th>  Product name</th>
        <th>  Supplier id</th>
       
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
            <td><?php echo $result['productid'];?></td>
        <td><a href="product-desc.php?id=<?php echo $result['productid'];?>"><img src="../../../../<?php echo $result['picture'];?>" width="50px" height=50px; class='img thumbnail'></a></td>
        <td><?php echo $result['sku'];?></td>
        <td><a href="product-desc.php?id=<?php echo $result['productid'];?>"><?php echo $result['productname'];?></a></td>
        <td><a href="vendors.php?id=<?php echo $result['supplierid'];?>"><?php echo $query_supplier_name['companyname'];?></a></td>
        </tr> 
        <?php } }else{ ?>
            <tr><td colspan="5">No records found.</td></tr> 
        <?php } ?>
    </table>
    <input type="submit" class="btn btn-danger" name="bulk_delete_submit" value="Delete"/>
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
    var result = confirm("Are you sure to delete users?");
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

    if(isset($_POST['bulk_delete_submit']))
    {
        $idArr = $_POST['checked_id'];

        foreach($idArr as $id)
        {
           $image_query = "SELECT picture,small,thumb FROM `products` WHERE productid =".$id;
            $fetch = mysqli_query($conn,$image_query);
            $get_image = mysqli_fetch_assoc($fetch);
           
            mysqli_query($conn,"DELETE FROM products WHERE productid=".$id);
           
            unlink('../../../../'.$get_image['picture']);
            unlink('../../../../'.$get_image['thumb']);
            unlink('../../../../'.$get_image['small']);
         
        }

    }
?>
<?php
//fetch all the data from database.
$rows=mysqli_num_rows(mysqli_query($conn,"select * from products"));
//calculate total page number for the given table in the database 
$total=ceil($rows/$limit);?>
<ul class='page' style="margin-top: 50px;padding: 30px;background: linear-gradient(#ffffff,#f2f2f2);">
<?php if($id>1)
{
    //Go to previous page to show previous 10 items. If its in page 1 then it is inactive
    echo "<a href='?id=".($id-1)."' ><li class='button blue-grade'>PREVIOUS</li></a>";
}
if($id!=$total)
{
    ////Go to previous page to show next 10 items.
    echo "<a href='?id=".($id+1)."' ><li class='button blue-grade'>NEXT</li></a>";
}

//show all the page link with page number. When click on these numbers go to particular page. 
        for($i=1;$i<=$total;$i++)
        {
            if($i==$id) { echo "<li class='current yellow-grade'>".$i."</li>"; }
            
            else { echo "<a href='?id=".$i." '><li class='blue-grade'>".$i."</li></a>"; }
        }
?>
