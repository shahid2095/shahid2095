
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";?>
<?php 
$num_rec_per_page=2;



if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM products LIMIT ".$start_from.", ".$num_rec_per_page.""; 
$rs_result = mysqli_query ($conn,$sql); //run the query
?> 
<table>
<tr><td>Name</td><td>Phone</td></tr>
<?php 
while ($row = mysqli_fetch_assoc($rs_result)) { 
?> 
            <tr>
            <td><?php echo $row['productname']; ?></td>
            <td><?php echo $row['productdescription']; ?></td>            
            </tr>
<?php 
}; 
?> 
</table>
<?php 
$sql = "SELECT * FROM products"; 
$rs_result = mysqli_query($conn,$sql); //run the query
$total_records = mysqli_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='test.php?page=1'><img src='img/left.png' width='20px' height='20px'></a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='test.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='test.php?page=$total_pages'><img src='img/right.png'  width='20px' height='20px'></a> "; // Goto last page
?>