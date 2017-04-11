<?php

if(isset($_GET['catagory']))
   {
    
    $id=$_GET["catagory"];
    

$query="SELECT * from sub_catagory where sub_catagory_id=(
select catagory_id from catagory where catagory_id='".$id."') ";

$fetch=mysqli_query($conn,$query);
if($fetch){
while($grab=mysqli_fetch_assoc($fetch))
{

echo $grab['catagory_name'];

}

   
   }
}


?>
