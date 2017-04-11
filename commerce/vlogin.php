<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/ssl.php";?>
<link rel="stylesheet" href="/commerce/system/css/custom/signup.css">

</head>
<body>
<?php include "system/php/header/header.php";?>

                                                        
                            
	<div class="container">

<div class="row" id="form">
<div class="row">
<div class="col-xs-3 col-sm-3 col-md-3">
</div>
<div class="col-xs-5 col-sm-5 col-md-5">
<h3 >Login to your account</h3>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
</div>
</div>
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="system/vendors/authenticate/authenticate.php" method="post">
			
			<hr class="colorgraph">
			<div class="row">
				
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
					</div>
				</div>
				
			</div>
		
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><a href="vregister.php" class="btn solid-grade">Register</a></div>
				<div class="col-xs-12 col-md-6"><a href="vlogin.php" class="btn solid-grade">Sign In</a></div>
			</div>
		</form>
	</div>
</div>

</div>
	<script type="text/javascript"></script>

                        


</body>
</html>