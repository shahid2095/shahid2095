<!DOCTYPE html>
<html>
<head>
	<title></title>

<?php  include "header_links.php";?>

<style type="text/css">
	#info
	{
		
		margin-top: 50px;
		box-shadow: 0px 0px 10px gray;
		padding: 20px;
		font-size: 15px;

	}

	.header
	{
		position: absolute;
		left: 33%;
	}
	.form
	{

		border-style: solid;
		border-width: thin;
		border-color:#d9d9d9;
		padding: 20px;

	}
	
	input
	{
		margin-top: 10px;
		border-style: solid;
		border-width: thin;
		border-color: #f2f2f2;
		border-radius: 3px;
		padding: 5px;
	}
	select
	{
		margin-top: 5px;
	}
</style>
</head>
<body >
<?php include "admin_header.php";?>

<div class="form" align="center">
<div class="row" style="">
<div class="col-lg-4">
	<div id="info">

	<h3>Session Data Table</h3>
	<hr>
	<table class="table">
	<thead>
	<tr>
		<td>Variable</td>
		<td>Value</td>
	</tr>
	</thead>
		                         <?php
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";

       $yah=mysqli_query($conn,"SELECT * FROM `session_variables`");

           if($yah)
                {
                  while($show=mysqli_fetch_assoc($yah))
                  {
                    ?>
          <tr>
          	<td><?php echo $show['name'];?></td>
          	<td><?php echo $show['value'];?></td>
          

          </tr>
          

          			<?php
            }
        }


                    ?>
                    </table>
</div>
</div>

<div class="col-lg-4">
	
<form action="php/session_set.php" method="get"  name="form_medium">

<input type="text" name="session_time" placeholder="Time in seconds"><br>

<input type="submit" name="submit" class="btn btn-default" value="Set Session">

</form>

</div>

<div class="col-lg-4"></div>

</div>
		

		
	</div>



</body>
</html>
