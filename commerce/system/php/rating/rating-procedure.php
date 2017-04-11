
  <?php
  $id = $_GET['id'];
  $yah=mysqli_query($conn,"SELECT * FROM `rating` WHERE productid =".$id."");
  $row = mysqli_num_rows($yah);
	if($row>0)
	{
 
	$show=mysqli_fetch_assoc($yah);

	if(isset($_GET['place']))
	{
	 if($_GET['place'] == "five")
	 {
	 	$update = $show['five']+1;
	 	$sql = "UPDATE `rating` SET `".$_GET['place']."`= ".$update." WHERE `productid` =".$id."";
	 	mysqli_query($conn,$sql);
	 }
	else if($_GET['place'] == "four")
	 {
	 		$update = $show['four']+1;
	 	$sql = "UPDATE `rating` SET `".$_GET['place']."`= ".$update." WHERE `productid` =".$id."";
	 	mysqli_query($conn,$sql);
	 }
	 else if($_GET['place'] == "three")
	 {
	 		$update = $show['three']+1;
	 	$sql = "UPDATE `rating` SET `".$_GET['place']."`= ".$update." WHERE `productid` =".$id."";
	 	mysqli_query($conn,$sql);
	 }
	 else if($_GET['place'] == "two")
	 {
	 		$update = $show['two']+1;
	 	$sql = "UPDATE `rating` SET `".$_GET['place']."`= ".$update." WHERE `productid` =".$id."";
	 	mysqli_query($conn,$sql);
	 }
	 else if($_GET['place'] == "one")
	 {
	 		$update = $show['one']+1;
	 	$sql = "UPDATE `rating` SET `".$_GET['place']."`= ".$update." WHERE `productid` =".$id."";
	 	mysqli_query($conn,$sql);
	 }
	}

	}
	else if($row <= 0)
	{
	
		$text = '<span id="text">Be the first to rate this product</span>';

		$one = 1;
		
		if(isset($_GET['place']))
		{
		$insert=mysqli_query($conn,"INSERT INTO `rating`(`productid`, `".$_GET['place']."`) VALUES (".$id.",".$one.")");
	 	mysqli_query($conn,$insert);
		}
	}

    

    	$yah=mysqli_query($conn,"SELECT * FROM `rating` WHERE productid =".$id."");
		$show=mysqli_fetch_assoc($yah);

		$one = ($show['one']*1);
		$two = ($show['two']*2);
		$three = ($show['three']*3);
		$four = ($show['four']*4);
		$five = ($show['five']*5);
		$total = $show['one']+$show['two']+$show['three']+$show['four']+$show['five'];
		$count = $one+$two+$three+$four+$five;
		if($count > 0)
		{
		$total_rating = $count/$total;
		}
		else
		{
			$total_rating = 0;
		}
		$total_rating =round($total_rating,1);
		$total_clicks = $show['one']+$show['two']+$show['three']+$show['four']+$show['five'];

	?>
