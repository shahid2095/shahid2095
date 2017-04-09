<?php
$con=mysqli_connect("localhost","root","","school");
if(isset($_POST['submit']))
{
	
echo 	$name = $_POST['name'];
echo	$school_name = $_POST['school'];
echo	$roll = $_POST['roll'];
echo	$result = $_POST['result'];

	$query = "insert into students(student_name,school_name,roll_no,result) values ('".$name."','".$school_name."','".$roll."','".$result."')";
	$statement = mysqli_query($con,$query);
	if($statement)
	{
		echo "<h1>Data Inserted Successfully";
	}
	else
	{
		echo mysqli_error($con);
	}

}
?> 