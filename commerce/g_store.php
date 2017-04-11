<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <!-- 
    	The codes are free, but we require linking to our web site.
    	Why to Link?
    	A true story: one girl didn't set a link and had no decent date for two years, and another guy set a link and got a top ranking in Google! 
    	Where to Put the Link?
    	home, about, credits... or in a good page that you want
    	THANK YOU MY FRIEND!
    -->
    <title></title>

<link rel="stylesheet" href="/commerce/system/css/custom/view_products.css">
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/ssl.php";?>
    <style type="text/css">
    	body{
    background:#eee;
}

img
{
  width: 300px;
  height: 200px;
}
    </style>
</head>
<body>
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/php/header/header.php";?>


<div class="modal" id="myModal">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
          Content for the dialog / modal goes here.
        </div>
        <div class="modal-footer">
          <a href="#" class="btn">Close</a>
          <a href="#" class="btn btn-primary">Save changes</a>
        </div>
      </div>
    </div>
</div>


<div class="container-fluid">
        
<div class="row" style="margin-top: 100px;">
<div class="col-md-9">
<div class="ibox-title">
     <div class="row">
       <div class="col-md-3"> <h5>Grocerie's </h5> </div>
       <div class="col-md-9">
        Relevance :<select>
                     <option value="">None</option>
                     <option value="">Highest rating</option>
                     <option value="">Top Sellers</option>
                   </select>
       

        </div>
     </div>        
                   
                </div>
       <div class="row">                                   


</div>

</div>


        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Sort Resturants </h5>
                </div>
                <div class="ibox-content">

  <?php
       $yah=mysqli_query($conn,"SELECT * FROM `grocery_options`");
           if($yah)
                {
                                                    
                 while($show=mysqli_fetch_assoc($yah))
                 {
                  ?>



                   <div class="row"> <div class="col-md-10"><?php echo $show['name'];?></div><div class="col-md-1"> <input class="pull-right" type="checkbox" id=""></div></div>

<?php
  }
}
                                                       
?>


                   <div class="row"> <div class="col-md-10">Select District</div><div class="col-md-1"></div></div>
                   <select>
                     <option value="">None</option>
                     <option value="">gulbarga</option>
                     <option value="">banglore</option>
                     <option value="">bidar</option>
                     <option value="">belgum</option>
                     <option value="">mysore</option>
                   </select>
                      <select>
                     <option value="">Select Area</option>
                   </select>
                   <input type="submit" name="" value="Go" class="round-default">
                    <hr>
                    <span class="text-muted small">
                        *No Special Notice
                    </span>
                    <div class="m-t-sm">
                    <input type="text" class="form-control" name="" placeholder="pincode check availibility ">
                        <div class="btn-group">
                        <a href="#" class="btn btn-default btn-sm"><i class="fa fa-shopping-cart"></i> Check</a>
                        <a href="#" class="btn btn-default btn-sm"> Cancel</a><a href="#" class="btn btn-default btn-sm">Set above Pincode (as default)</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ibox">
                <div class="ibox-title">
                    <h5>Support</h5>
                </div>
                <div class="ibox-content text-center">
                    <h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
                    <span class="small">
                        Please contact with us if you have any questions. We are avalible 24h.
                    </span>
                </div>
            </div>

            <div class="ibox">
                <div class="ibox-content">

                    <p class="font-bold">
                    Resturants Suggestion from Stepdoor
                    </p>
                    <hr>
                    <div>
                        <a href="#" class="product-name"> Taj Resturant</a>
                        <div class="small m-t-xs">
                            Serve you best food
                        <div class="m-t text-righ">
                        </div>
                    </div>
                    <hr>
                    <div>
                        <a href="#" class="product-name"> Maharaja Sweets</a>
                        <div class="small m-t-xs">
                            Best Sweets in Market
                        </div>
                        <div class="m-t text-righ">
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>

<?php include "inc/footer.php";?>
<script type="text/javascript">
  $('document').ready(function(){
  $('#myModal').modal({show:true})
});

$('#myModal').on('show.bs.modal', function (e) {
    console.log('modal show');
});
</script>
</body>
</html>