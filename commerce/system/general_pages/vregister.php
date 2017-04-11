<?php
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";

$query = "INSERT INTO `suppliers`(`companyname`,`contactFname`, `contactLname`, `address1`, `city`, `postalcode`, `phone`, `email`, `password`) VALUES ('".$_POST['display_name']."','".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['address']."','".$_POST['city']."',".$_POST['pincode'].",".$_POST['mobile'].",'".$_POST['email']."','".$_POST['password']."')";

mysqli_query($conn,$query);

echo mysqli_error($conn);

function GeneratePassword($length=5, $strength=3)
{
    $vowels = '0123456789';
    $consonants = '0123456789';
    if($strength >= 1) $consonants .= '0123456789';
    if($strength >= 2) $vowels .= '0123456789';
    if($strength >= 3) $consonants .= '12345';
    if($strength >= 4) $consonants .= '0123456789';
    if($strength >= 5) $vowels .= '0123456789';
 
    $password = '';
    $alt = time() % 2;
    for($i = 0; $i < $length; $i++){
        if($alt == 1){
            $password .= $consonants[(rand() % strlen($consonants))];
            $alt = 0;
        }else{
            $password .= $vowels[(rand() % strlen($vowels))];
            $alt = 1;
        }
    }
    return $password;
}
		$string = GeneratePassword();
		echo $string;
//Your authentication key
$authKey = "127249Au0hvkerXjo58419ca0";

//Multiple mobiles numbers separated by comma
$mobileNumber = $_POST['mobile'];

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "NewUsr";

//Your message to send, Add URL encoding here.
$message = urlencode("One Time Password   ".$string."   Don't Replay");

//Define route 
$route = 4;
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);

//API URL
$url="https://control.msg91.com/api/sendhttp.php";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);
header("location:../../vlogin.php?status=success");
?>