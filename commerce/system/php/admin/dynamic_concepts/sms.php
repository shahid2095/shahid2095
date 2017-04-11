<!DOCTYPE html>
<html>
<head>
	<title>Send SMS</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<style type="text/css">
	body{

   
    background-image: linear-gradient(#79a06d, #79a06d); 
	}

#box{
    border: 1px solid rgb(200, 200, 200);
    box-shadow: rgba(0, 0, 0, 0.1) 0px 5px 5px 2px;
    background: rgba(200, 200, 200, 0.1);
    border-radius: 4px;
    top:50px;
}

h2{
    text-align:center;
    color:#fff;
}
	</style>
</head>
<body>
<?php include "admin_header.php";?>
 
 <div class="container-fluid">
                <div class="row-fluid" >
                   
                      
                     <div class="col-md-offset-4 col-md-4" id="box">
                      <h2>SMS Interface</h2>
                       
                          
                           

                                <form class="form-horizontal" action="php/sms_api.php" method="post" id="contact_form">
                                    <fieldset>
                                        <!-- Form Name -->


                                        <!-- Text input-->

                                         <select name="route">
                                        	<option value="4">Transactional</option>
                                        	<option value="1">Promotional</option>
                                        </select>
                                          <hr>
                                        <div class="form-group">

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                                    <input name="mobiles" placeholder="Mobile Number" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="sender" value="NewUsr">
                                       

                                       


                                        <input type="hidden" name="country" value="91">
                                  

                                        <div class="form-group">

                                            <div class="col-md-12 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                                    <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-warning pull-right">Send<span class="glyphicon glyphicon-send"></span></button>
                                            </div>
                                        </div>

                                    </fieldset>
                                </form>
                    </div> 
</div>
</body>
</html>