<?php
if($_GET['status']=="success")
{
	?>
	<!DOCTYPE html>
<html>
<head>
	<title>Student's data</title>
</head>
<body>
<form action="" method="post">
<table width="600" height="200" border="5" align="center">
<tr>
		<td colspan="5" align="center" bgcolor="yellow"><h1>Student's Registration</h1></td>
	</tr>
		<td align="right">Student name:</td>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>
		<td align="right">School Nmae:</td>
		<td><input type="text" name="school"></td>
	</tr>
	<tr>
		<td align="right">Roll_no:</td>
		<td><input type="text" name="roll"></td>
	</tr>
	<tr>
		<td align="right">Result</td>
		<td><input type="text" name="result"></td>
	</tr>
	<tr>
		<td colspan="5" align="center"><input type="submit" name="submit" value="submit now"></td>

</body>
</html>

<?php
$con=mysqli_connect("localhost","root","","school");
if(isset($_POST['submit']))
{
	
 	$name = $_POST['name'];
	$school_name = $_POST['school'];
	$roll = $_POST['roll'];
	$result = $_POST['result'];

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
}
else
{
	header("location:index.php");
}
?>