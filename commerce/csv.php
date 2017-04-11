<?php
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
$filename = "report.csv";
$fp = fopen('php://output', 'w');

$query = "SELECT * FROM orders WHERE (orderdate BETWEEN '2016-10-01' AND '2016-10-25')";
$result = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($result)) {
	$header[] = $row['ordernumber'];
	$header[] = $row['customerid'];
	$header[] = $row['orderdate'];
	$header[] = $row['salestax'];
	$header[] = $row['timestamp'];
	$header[] = $row['paid'];
	$header[] = $row['status'];
	$header[] = 0x0A;
}	
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);

?>