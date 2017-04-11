<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
	?>
<link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery311.js"></script>
  <script src="../js/bootstrap.min.js"></script>
<style type="text/css">
	hr.message-inner-separator
{
    clear: both;
    margin-top: 10px;
    margin-bottom: 13px;
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
    background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}

</style>
</head>
<body>

<?php

$row_cnt = $_GET['row_cnt'];

    for($i=0;$i<$row_cnt;$i++)
    {
    $id = $_GET['order_active_'.$i.''];
 
     $order = mysqli_query($conn,"UPDATE `cart` SET `active`= 1 WHERE id =".$id);

     if($order)
     {

     	?>

<div class="row" style="position:relative; top: 100px;margin: 0px;padding:0px;">
        <div class="col-sm-3 col-md-3"></div>
   
        <div class="col-sm-6 col-md-6">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button>
              <strong><h2> <span class="glyphicon glyphicon-ok"></span> Thank You</h2></strong>
                <hr class="message-inner-separator">
                <p>
                    <h3>Your Order Has Been Placed Successfully</h3></p>
            </div>
        </div>
        <div class="col-sm-3 col-md-3"></div>
</div>
     	<?php

     	sleep(3);
     	header("location:../../index.php");

     }
   

    }


?>



</body>
</html>





