<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php  include "ssl.php";?>
     <style type="text/css">


    </style>

</head>
<body>
<?php include "admin_header.php";?>

<div class="row">
	<div class="col-lg-3" style="margin-left: 100px;">
			
				<h3>Create Attributes</h3>
		<hr>
			<form action="php/insert_attributes.php" method="post">
				<input type="text" name="attribute">
				<input type="submit" name="submit" class="round-default" value="Go">
			</form>


	</div>
		<div class="col-lg-3" style="margin-left: 100px;">
			
				<h3>Attributes List</h3>
		<hr>
							
				  <?php
				       $yah=mysqli_query($conn,"SELECT * FROM `product_attributes`");
				           if($yah)
				                {
				 while($show=mysqli_fetch_assoc($yah))
				                  {
				?>

				<li><a href="<?php echo $show['id'];?>"><?php echo $show['name'];?></a></li>

				<?php
				  					}
								}
				                       
				?>



	</div>

		<div class="col-lg-3" style="margin-left: 100px;">
			
				<h3>Attribute Value's</h3>
		<hr>
							
				<form action="php/attr_values.php" method="post">

				<select name="attr_value" style="padding: 3px;">

					<option value="">Select Attribute</option>
						  <?php
				       $yah=mysqli_query($conn,"SELECT * FROM `product_attributes`");
				           if($yah)
				                {
				 while($show=mysqli_fetch_assoc($yah))
				                  {
				?>
				<option value="<?php echo $show['id'];?>"><?php echo $show['name'];?></option>
				

				<?php
				  					}
								}
				                       
				?>
					
					
				</select>

				<input type="text" name="attribute_values">
				<input type="submit" name="submit" class="round-default" value="Go">
					
				</form>



	</div>

</div>

<div class="row">
	
	<div class="container-fluid col-lg-6">
<?php
    $start=0;
$limit=5;

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $start=($id-1)*$limit;
}
else
{
    $id=1;
}

$query = mysqli_query($conn,"SELECT * FROM `attribute_values` LIMIT ".$start.", ".$limit."");

?>
  
<form name="bulk_action_form" action="" method="post" onsubmit="return deleteConfirm();"/>
    <table class="table">
        <thead>
        <tr>
            <th><input type="checkbox" name="select_all" id="select_all" value=""/></th>        
        
        <th> Associated Attribute</th>
         <th>Linked Attribute</th>
      
       
      </tr>
    </thead>
    <tbody>
        </tr>
        </thead>
        <?php
            if(mysqli_num_rows($query) > 0){
                while($result = mysqli_fetch_assoc($query)){
                        $supplier = "SELECT * FROM `product_attributes` WHERE id = ".$result['attribute_id']."";
$attribute_name = mysqli_query($conn,$supplier);
$query_supplier_name = mysqli_fetch_assoc($attribute_name);

        ?>
        <tr>
            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $result['id']; ?>"/></td>        
            <td><?php echo $result['value_name'];?></td>
       
        	<td><a href="vendors.php?id=<?php echo $result['id'];?>"><?php echo $query_supplier_name['name'];?></a></td>
        </tr> 
        <?php
        	 } 
        }
        else
        	{ 
        		?>
            <tr><td colspan="5">No records found.</td></tr> 
        <?php } ?>
        </tbody>
    </table>
    <input type="submit" class="btn btn-danger" name="bulk_delete_submit" value="Delete"/>
</form>
<?php

if(isset($_GET['status']))
{
  echo $_GET['status'];
}



    if(isset($_POST['bulk_delete_submit']))
    {
        $idArr = $_POST['checked_id'];

        foreach($idArr as $id)
        {
         
           
            mysqli_query($conn,"DELETE FROM `attribute_values` WHERE id=".$id);
           
         
         
        }

    }
?>
<?php
//fetch all the data from database.
$rows=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `attribute_values`"));
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

</div>









	<div class="container-fluid col-lg-6">
<?php
    $start2=0;
$limit2=5;

if(isset($_GET['id2']))
{
    $id2=$_GET['id2'];
    $start2=($id2-1)*$limit2;
}
else
{
    $id2=1;
}

$query = mysqli_query($conn,"SELECT * FROM `product_attributes` LIMIT ".$start2.", ".$limit2."");

?>
  
<form name="bulk_action_form" action="" method="post" onsubmit="return deleteConfirm();"/>
    <table class="table">
        <thead>
        <tr>
            <th><input type="checkbox" name="select_all" id="select_all" value=""/></th>        
        
        <th> Associated Attribute</th>
         <th>Linked Attribute</th>
      
       
      </tr>
    </thead>
    <tbody>
        </tr>
        </thead>
        <?php
            if(mysqli_num_rows($query) > 0){
                while($result = mysqli_fetch_assoc($query)){
                       
        ?>
        <tr>
            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $result['id']; ?>"/></td>        
            <td><?php echo $result['name'];?></td>
       
       </tr> 
        <?php
        	 } 
        }
        else
        	{ 
        		?>
            <tr><td colspan="5">No records found.</td></tr> 
        <?php } ?>
        </tbody>
    </table>
    <input type="submit" class="btn btn-danger" name="bulk_delete_submit" value="Delete"/>
</form>
<?php

if(isset($_GET['status']))
{
  echo $_GET['status'];
}



    if(isset($_POST['bulk_delete_submit']))
    {
        $idArr = $_POST['checked_id'];

        foreach($idArr as $id)
        {
         
           
            mysqli_query($conn,"DELETE FROM `product_attributes` WHERE id=".$id);
           
         
         
        }

    }
?>
<?php
//fetch all the data from database.
$rows2=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `product_attributes`"));
//calculate total page number for the given table in the database 
$total2=ceil($rows2/$limit2);?>
<ul class='page' style="margin-top: 50px;padding: 30px;background: linear-gradient(#ffffff,#f2f2f2);">
<?php if($id2>1)
{
    //Go to previous page to show previous 10 items. If its in page 1 then it is inactive
    echo "<a href='?id2=".($id2-1)."' ><li class='button blue-grade'>PREVIOUS</li></a>";
}
if($id2!=$total2)
{
    ////Go to previous page to show next 10 items.
    echo "<a href='?id2=".($id2+1)."' ><li class='button blue-grade'>NEXT</li></a>";
}

//show all the page link with page number. When click on these numbers go to particular page. 
        for($i=1;$i<=$total2;$i++)
        {
            if($i==$id2) { echo "<li class='current yellow-grade'>".$i."</li>"; }
            
            else { echo "<a href='?id2=".$i." '><li class='blue-grade'>".$i."</li></a>"; }
        }
?>

</div>
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
