<html >
<head>
<title>Ecommerce</title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="/commerce/system/css/custom/luminous_buttons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<body >
<?php include "admin_header.php";?>
<style type="text/css">
  
.update-nag{
  display: inline-block;
  font-size: 14px;
  text-align: left;
  background-color: #fff;
  height: 40px;
  -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.2);
  box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
  margin-bottom: 10px;
}

.update-nag:hover{
    cursor: pointer;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.4);
  box-shadow: 0 1px 1px 0 rgba(0,0,0,.3);
}

.update-nag > .update-split{
  background: #337ab7;
  width: 33px;
  float: left;
  color: #fff!important;
  height: 100%;
  text-align: center;
}

.update-nag > .update-split > .glyphicon{
  position:relative;
  top: calc(50% - 9px)!important; /* 50% - 3/4 of icon height */
}
.update-nag > .update-split.update-success{
  background: #5cb85c!important;
}

.update-nag > .update-split.update-danger{
  background: #d9534f!important;
}

.update-nag > .update-split.update-info{
  background: #5bc0de!important;
}



.update-nag > .update-text{
  line-height: 19px;
  padding-top: 11px;
  padding-left: 45px;
  padding-right: 20px;
}
</style>


<div class="row">

<div class="col-md-2">
  
</div>

<div class="col-md-8">


<ul class="nav nav-pills">
  <li class="active"><a data-toggle="pill" href="#home">New Notification</a></li>
  <li><a data-toggle="pill" href="#menu1">All Notifications</a></li>
  <li><a data-toggle="pill" href="#d1">New Product</a></li>
  <li><a data-toggle="pill" href="#d2">New Seller</a></li>
  <li><a data-toggle="pill" href="#d3">New Customer</a></li>
  <li><a data-toggle="pill" href="#d4">Staff Logged In's</a></li>
  <li><a data-toggle="pill" href="#d5">Seller's Deactivated</a></li>

</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
   <div class="container">

  <table class="table">
    <thead>
    
              <?php


  $result="select event,date_time from log_table where var_log = 0 order by log_id DESC";

    $test=mysqli_query($conn,$result);
  if($test)
  {
    while($grab=mysqli_fetch_assoc($test)){?>
    </thead>
    <tbody>
      <tr>
       <td>
<div class="update-nag">
            <div class="update-split"><i class="glyphicon glyphicon-leaf"></i></div>
            <div class="update-text"> 
<?php
      echo $grab['event'];

?> </div>
          </div> </td>
      <td>

<?php
      echo $grab['date_time'];

?>  </td>
      </tr><?php

    }
  }
  if($row_cnt = 0)
  {
    echo "<h3> No New Notifications!</h3>";
  }

  $result="update log_table set var_log=1";
  
  mysqli_query($conn,$result);


?>


     
    </tbody>
  </table>
</div>
 
</div>

  <div id="menu1" class="tab-pane fade">

  <table class="table">
    <thead>
      <tr>
        <th>Event</th>
        <th>Date & Time</th>
      
      </tr>

 <?php   
$result="select event,date_time from log_table order by log_id DESC";

    $test=mysqli_query($conn,$result);
  if($test)
  {
    while($grab=mysqli_fetch_assoc($test)){?>
    </thead>
    <tbody>
      <tr>
       <td>

<?php
      echo $grab['event'];

?>  </td>
      <td>

<?php
      echo $grab['date_time'];

?>  </td>
      </tr><?php

    }
  }



?>
</tbody>
</table>




  </div>



  <div id="d1" class="tab-pane fade in active">
   <div class="container">

  <table class="table">
    <thead>
    
              <?php

  $result="select event,date_time from log_table where var_log = 0 order by log_id DESC";

    $test=mysqli_query($conn,$result);
  if($test)
  {
    while($grab=mysqli_fetch_assoc($test)){?>
    </thead>
    <tbody>
      <tr>
       <td>

<?php
      echo $grab['event'];

?>  </td>
      <td>

<?php
      echo $grab['date_time'];

?>  </td>
      </tr><?php

    }
  }
  if($row_cnt = 0)
  {
    echo "<h3> No New Notifications!</h3>";
  }

  $result="update log_table set var_log=1";
  
  mysqli_query($conn,$result);


?>


     
    </tbody>
  </table>
</div>
 
</div>


  <div id="d2" class="tab-pane fade in active">
   <div class="container">

  <table class="table">
    <thead>
    
              <?php
  $result="select event,date_time from log_table where var_log = 0 order by log_id DESC";

    $test=mysqli_query($conn,$result);
  if($test)
  {
    while($grab=mysqli_fetch_assoc($test)){?>
    </thead>
    <tbody>
      <tr>
       <td>

<?php
      echo $grab['event'];

?>  </td>
      <td>

<?php
      echo $grab['date_time'];

?>  </td>
      </tr><?php

    }
  }
  if($row_cnt = 0)
  {
    echo "<h3> No New Notifications!</h3>";
  }

  $result="update log_table set var_log=1";
  
  mysqli_query($conn,$result);


?>


     
    </tbody>
  </table>
</div>
 
</div>




  <div id="d3" class="tab-pane fade in active">
   <div class="container">

  <table class="table">
    <thead>
    
              <?php

  $result="select event,date_time from log_table where var_log = 0 order by log_id DESC";

    $test=mysqli_query($conn,$result);
  if($test)
  {
    while($grab=mysqli_fetch_assoc($test)){?>
    </thead>
    <tbody>
      <tr>
       <td>

<?php
      echo $grab['event'];

?>  </td>
      <td>

<?php
      echo $grab['date_time'];

?>  </td>
      </tr><?php

    }
  }
  if($row_cnt = 0)
  {
    echo "<h3> No New Notifications!</h3>";
  }

  $result="update log_table set var_log=1";
  
  mysqli_query($conn,$result);


?>


     
    </tbody>
  </table>
</div>
 
</div>



  <div id="d4" class="tab-pane fade in active">
   <div class="container">

  <table class="table">
    <thead>
    
              <?php

  $result="select event,date_time from log_table where var_log = 0 order by log_id DESC";

    $test=mysqli_query($conn,$result);
  if($test)
  {
    while($grab=mysqli_fetch_assoc($test)){?>
    </thead>
    <tbody>
      <tr>
       <td>

<?php
      echo $grab['event'];

?>  </td>
      <td>

<?php
      echo $grab['date_time'];

?>  </td>
      </tr><?php

    }
  }
  if($row_cnt < 1)
  {
    echo "<h3 style='margin-left:20%;'> No New Notifications!</h3>";
  }

  $result="update log_table set var_log=1";
  
  mysqli_query($conn,$result);


?>


     
    </tbody>
  </table>
</div>
 
</div>


</div>
</div>

  

  </div>

<div class="col-md-2">
  
</div>


</div>




<ul class="pagination">


    <li><a href=""></a></li>


</ul>





</body>
</html>