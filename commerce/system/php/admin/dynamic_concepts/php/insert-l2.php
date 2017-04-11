<html >
<head>
<title>Ecommerce</title>



<link rel='stylesheet' href='css/bootstrap.min.css'>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300' rel='stylesheet' type='text/css'>
    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script>
        window.Modernizr || document.write('<script src="js/vendor/modernizr-2.8.3.min.js"><\/script>')
    </script>

</head>

<body >
<?php include "inc/header.php";?>
<?php include "inc/control-header.php";?>

<div class="container">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Add L-Two Category Item</a></li>
  <li><a data-toggle="tab" href="#menu1">Remove L-Two Category Item</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
   <div class="row">
   <div class="col-md-8">
<form method="get" action="inc/insert_into_catagory_l2.php" style="margin-top: 2%;">
  

<select>
<option>Select Main Category</option>
  <?php
               

      $sql="SELECT `catagory_id`,`catagory_name` FROM `catagory`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {
     
          ?>
          <option value="<?php echo $result['catagory_id'];?>"><?php echo $result['catagory_name'];?></option>
          
    
           <?php }

            ?>
        
        <?php
      }
    
?>

</select>
<input type="text" class="form-control" name="name" placeholder="Name of Category" >
<input type="text" class="form-control" name="description" placeholder="Description">

<input type="text" class="form-control" name="active" placeholder="To Activate Type 1 for deactivation 0" >
<input type="submit" class="form-control btn btn-default" name="insert_l1" value="Create">

<style type="text/css">
  input
  {
    margin-top: 2%;
  }
</style>


</form>
</div>
<div class="col-md-4">
<h3>Available Categories</h3>
 <?php
               

      $sql="SELECT `catagory_id`,`catagory_name`,`description` FROM `catagory`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {
     
          ?>
          <li style="margin-top: 2%;"><a href="exp.html?id=<?php echo $result['catagory_id'];?>" style="color:#000000;font-weight: bold;"><?php echo $result['catagory_name'];?></a></li>
          
    
           <?php }

            ?>
        
        <?php
      }
    
?>





</div>

</div>
  </div>



  <div id="menu1" class="tab-pane fade">
    <h3>Click On Category To Remove</h3>
    
<div class="row">

  
 <?php
              
                

                 $sql="SELECT `catagory_id`,`catagory_name`,`description` FROM `catagory`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {
      $sql2="SELECT `catagory_name`,`sub_catagory_id` FROM `sub_catagory` WHERE catagory_id = ".$result['catagory_id']." ";
      $query2 = mysqli_query($conn,$sql2);


          ?>
          <li ><a href="exp.html?id=<?php echo $result['catagory_id'];?>" style="color:#000000;font-weight: bold;"><?php echo $result['catagory_name'];?></a><ul>
          
                
              <?php
               if($query2)
      {
        while($result2 = mysqli_fetch_assoc($query2))
        {
          ?>
             
                <li style="font-size: 16px;margin:0px;"><a href="exp.html?id=<?php echo $result['catagory_id'];?>&id2=<?php echo $result2['sub_catagory_id'];?>" style="padding:0px;margin:0px;"><?php echo $result2['catagory_name'];?></a></li>
              
              <?php 
            }
            }

            ?>
             </ul>
                        </li>
        <?php
      }
      }
?>


</div>




  </div>
</div>

</div>






</body>
</html>