

<?php

		 include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";

		$price = $_GET['price'];
		$activefrom = $_GET['fromdate'];
		$activetill = $_GET['tilldate'];
		$usable = $_GET['quantity'];
		function generateCouponCode() {
			$length = 20;
		    $allowedChars = "abcdefghijklmnopqrstuvwxyz0123456789";
		    $string = "";
		    for($i=0;$i<$length;$i++){
		        $randPos = rand(0,36);
		        $string .= $allowedChars{$randPos};
		    }
		    return $string;
		}

		$value =  generateCouponCode();

		$my_img = imagecreate( 200, 80 );
		$background = imagecolorallocate( $my_img, 255, 255, 255 );
		$text_colour = imagecolorallocate( $my_img, 0, 0, 0 );
		imagestring( $my_img, 5, 30, 25, $value , $text_colour );
		imagesetthickness ( $my_img, 5);

		function generateAuthenticationString() {
			$length = 20;
		    $allowedChars = "abcdefghijklmnopqrstuvwxyz0123456789";
		    $string = "";
		    for($i=0;$i<$length;$i++){
		        $randPos = rand(0,36);
		        $string .= $allowedChars{$randPos};
		    }
		    return $string;
		}

		$string = generateAuthenticationString();


		header( "Content-type: image/png" );
		imagepng( $my_img,'Coupons_database/'.$string.'.jpg' );
		imagecolordeallocate( $text_color );
		imagecolordeallocate( $background );
		$path = 'Coupons_database/'.$string.'.jpg';
		$log = "INSERT INTO `coupon_codes`(`file_name`, `path`, `price`, `code`,`activefrom`,`activetill`,`usable`) VALUES ('".$string."','".$path."','".$price."','".$value."','".$activefrom."','".$activetill."','".$usable."')";


		if(mysqli_query($conn,$log))
		{
			echo "successfully Generated Coupon ".$string;
		}
		else
		{
			echo "unsuccessfull";
		}
		header("location:coupon_code.php");

?>