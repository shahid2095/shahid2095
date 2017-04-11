<?php

$session = $_GET['session_time'];

include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";

if($session!="")
{
mysqli_query($conn, "UPDATE `session_variables` SET `value`=".$session." WHERE id = 1");
}








header("location:../session.php");
?>