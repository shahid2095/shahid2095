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
<div class="col-xs-7 col-sm-7 col-md-7">
<h3 >Register for better Experiance</h3>
</div>
<div class="col-xs-2 col-sm-2 col-md-2">
</div>
</div>

    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="system/general_pages/register.php" method="get">
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Display Name" tabindex="3">
			</div>
			<div class="form-group">
				<input type="text" name="mobile" id="mobile" class="form-control input-lg" placeholder="Your mobile number" tabindex="3">
			</div>
			<div class="form-group">
				<input type="text" name="pincode" id="pincode" class="form-control input-lg" placeholder="Pincode" tabindex="3">
			</div>
			<div class="form-group">
				<input type="text" name="address" id="address" class="form-control input-lg" placeholder="Address" tabindex="3">
			</div><div class="form-group">
				<input type="text" name="city" id="" class="form-control input-lg" placeholder="City" tabindex="3">
			</div>
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-1 col-sm-1 col-md-1">
					
				</div>
				<div class="col-xs-10 col-sm-10 col-md-10">
					 By clicking <strong class="label label-primary ">Register</strong>, you agree to the <a href="javascript:;" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1">
					
				</div>
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn solid-grade pull-right" tabindex="7"></div>
				<div class="col-xs-12 col-md-6"><a href="login.php" class="btn solid-grade">Sign In</a></div>
			</div>
		</form>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
			</div>
			<div class="modal-body">
			<?php include "../../license/license.txt";?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
	<script type="text/javascript"></script>

                        


</body>
</html>