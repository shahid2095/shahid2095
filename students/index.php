<html>
  <title>Login</title>
  <body>
  <form action="" method="post">
  <table width="400" height="100" border="2" align="center">
  <tr><tr>
		<td colspan="2" align="center" bgcolor="skyblue"><h1>Login</h1></td></tr>
	<td align="right">User Id:</td>
		<td><input type="text" name="userid"></td>
		</tr>
	<tr>
		<td align="right">Password:</td>
		<td><input type="Password" name="Password"></td>
	</tr>
	<tr>
		<td colspan="5" align="center"><input type="submit" name="submit" value="login"></td>
		
  
  </form>
  </body>
</html>
<?php
$con=mysqli_connect("localhost","root","","school");

if(isset($_POST['submit']))
{

 	$userid = $_POST['userid'];
	$Password = $_POST['Password'];
	$query_statement = "SELECT * FROM `login` WHERE id = 3";
	$query_fetch_array = mysqli_query($con,$query_statement);
	$query_fetch_data = mysqli_fetch_assoc($query_fetch_array);

	if($userid == $query_fetch_data['user_name'] AND $Password == $query_fetch_data['password'])
	{
		header("location:school.php?status=success");
	}
	else
	{
		echo "User Does Not Exist";
	}

}


?>
