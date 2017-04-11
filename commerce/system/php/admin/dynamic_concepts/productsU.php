<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Control Panel</title>

  <?php include "header_links.php";?>
<link rel="stylesheet" type="text/css" href="css/custom/input_forms.css">
</head>
<body>

<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";?>
<?php include "admin_header.php";?>

<div class="row" style="padding: 0px;margin: 0px;">
  
<div class="col-lg-10">
    

<?php


for ($i=0; $i <2000 ; $i++)
 { 
  echo "THIS IS CODING";
}


?>



</div>
<div class="col-lg-2">
    
    <div class="box-card" style="box-shadow:0px 0px 1px black;background-color: #f2f2f2;">

    <form action="" method="get">
     
     <h4><b>FILTER PRODUCT</b></h4><hr>
      
        <input type="text" name="term" placeholder="Search Term">
        <div class="space">
         <b>Search Term</b>
         
         <select name="filter" class="pull-right">
          <option>NAME</option>
          <option>VENDOR</option>
          <option>SKU</option>
          <option>PRODUCTID</option>
          <option>PRICE</option>
        </select>
        </div>
      <br>
        <div class="space">
           <b>Search Results</b>
         
        <select name="page" class="pull-right">
          <option>10</option>
          <option>50</option>
          <option>100</option>
          <option>500</option>
          <option>1000</option>
          <option>ALL</option>
        </select>
        </div>
    <br>
    <input type="checkbox" name="price"> Price
    <input type="checkbox" name="vendor"> Vendor
    <input type="checkbox" name="sku"> Sku

    <input type="checkbox" name="desc"> Description
    <input type="checkbox" name="linked"> Linked
    <br><hr>
    <h4><b>Display Only</b></h4>
      <input type="checkbox" name="linked"> Linked
        <input type="checkbox" name="most_buy"> Most Purchased
          <input type="checkbox" name="most_seen"> Most Seen
          <hr>
    <input type="submit" class="update" name="submit" value="Search">
    </form>

      
    </div>



</div>

</div>



<script type="text/javascript">

var windowsize = $(window).width();

if(windowsize > 995)
{
  
$(function(){
  var offset = 30;

  $(window).scroll(function(){
    if($(window).scrollTop() > offset)
    {
        $(".box-card").css({
        'position':'fixed',
        'top':'30px',
        'width':'15%',
        'transition':'all 0.1s'
      });
    }
    else
    {
      $(".box-card").css({
        'position':'static',
        'width':'100%'
        });
    }
  });
});



}
else
{

}


</script>

</body>
</html>
