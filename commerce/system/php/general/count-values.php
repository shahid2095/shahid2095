<?php
	
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";

    $sql3 = "SELECT id FROM `_control`";
    $query3 = mysqli_query($conn,$sql3);
  
    $row_cnt = mysqli_num_rows($query3);
  	



     $sql3 = "SELECT id FROM `_side_b`";
    $query3 = mysqli_query($conn,$sql3);
  
    $_side_b = mysqli_num_rows($query3);


      $sql2="SELECT * FROM `_control`";
      $query2 = mysqli_query($conn,$sql2);
      $result2 = mysqli_fetch_assoc($query2);
     
 for($i=0;$i<=$_side_b;$i++)
{

      $sql4="SELECT * FROM `_side_b` WHERE id = ".$i."";
        $qu = mysqli_query($conn,$sql4);
     
        $res2[$i]= mysqli_fetch_assoc($qu);
    
}     
     	
for($i=1;$i<=$row_cnt;$i++)
{

      $sql4="SELECT * FROM `_control` WHERE id = ".$i."";
        $qu = mysqli_query($conn,$sql4);
        $res[$i]= mysqli_fetch_assoc($qu);
    
}
?>