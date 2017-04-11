<?php
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
if($_GET['term']==null)
{
	$_GET['term'] == "";
}
if($_GET['filter_by']==null)
{
	$_GET['filter_by'] == "name";
}
?>


<div id="ajax-return">
<div id="sub_ajax_return">
	Search <?php echo $_GET['term'];?>

</div>

<div id="two_sub_ajax_return">
	Filter By <?php echo $_GET['filter_by'];?>
</div>
<hr>

<?php


$yah=mysqli_query($conn,"SELECT * FROM `suppliers` WHERE `".$_GET['filter_by']."` LIKE '".$_GET['term']."%'");
           if($yah)
                {
                                                    
                 while($show=mysqli_fetch_assoc($yah))
                  {
                  ?>
<div class="filter-link">
<a href="logging_productsGR.php?supplierid=<?php echo $show['supplierid'];?>"><?php echo $show['companyname'];?></a><br><span style="font-weight: lighter;">
Contact :<?php echo $show['phone'];?><br>
State   :<?php echo $show['state'];?><br>
Pincode :<?php echo $show['postalcode'];?><br></span>
	
</div>
               

					<?php
  					}
				}








?>








</div>




