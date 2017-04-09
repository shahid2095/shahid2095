<?php
	include("connection.php");
	session_start();
	function display_cart(){
	
		global $con;
		$q = mysqli_query($con, "SELECT `id`, `image`,`name`,`desc`,`price` FROM cart WHERE `quantity` > 0");
		$num =mysqli_num_rows($q);
		while ($fetch = mysqli_fetch_assoc($q)) 
		{
			echo '<img src="images/' .$fetch['image'].'" width="120" height="120" /><br /><span id="name">'.$fetch['name'].'</span><br />'.$fetch['desc'].'<br /> $ '.$fetch['price'].'<br />'
			.'<a href="cart.php?add ='.$fetch['id'].'">Add To Cart</a><br /><br />';
		}
	}
	if(isset($_GET['add']) && !empty($_GET['add']))
	{
		$id = $_GET['add'];
		$q = mysqli_query($con,"SELECT `id`,`quantity` FROM cart WHERE `id` ='".$id."'");
			while($quantity = mysqli_fetch_assoc($q))
			
				if($quantity['quantity']!= @$_SESSION['cart_'.$id])
				{
					echo $_SESSION['cart_'.$id]++;
				}
			
		
	}
	function product()
	{
		foreach ($_SESSION as $name => $value) {
			if($value > 0){
				if(substr($name,0,5) == 'cart'){
					$id = substr($name,5,(strlen($name-5)));
						$q = mysqli_query($con, "SELECT `id`,`shipping`, `name`,`price` FROM cart WHERE `id` ='" .$id."'");
						while($get = mysqli_fetch_assoc($q)) {
							$total = $value * $get('price');
							echo $get['name'].'X' .$value. '@'.$get['price']
.'=$'.$total;						}
				}
			}
		}
	}



?>