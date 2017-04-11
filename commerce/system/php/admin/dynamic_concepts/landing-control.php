<html >
<head>
<title>Ecommerce</title>
  <?php include "header_links.php";?>
</head>

<body >
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";?>
<?php include "admin_header.php";?>
  <style type="text/css">
  input
  {
    margin:1%;
    padding:1%;
    border-color:#d9d9d9;
    border-style: solid;
    border-width: thin;
    border-radius:2px;
    width: 100%;
  }
  
  textarea
  {
    width: 100%;
    margin:1%;
    padding:2%;
  }
  select
  {
    width: 100%;
    margin:1%;
    padding:2%;
  }
</style>

<div class="container">
  


  <h2>Landing Page Control</h2>
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#land">Blank</a></li>
  <li ><a data-toggle="tab" href="#home2">Landing Page Row's</a></li>
  <li ><a data-toggle="tab" href="#home3">Create New Landing Page Row</a></li>

  <li ><a data-toggle="tab" href="#ulpr">Update Landing Page Row</a></li>
</ul>

<div class="tab-content">
<div id="land" class="tab-pane fade active">
      


    </div>
    <div id="ulpr" class="tab-pane fade ">

<div class="table-responsive">
       <table class="table-condensed">
    <thead>
      <tr>
        <th class="success">Time(in MilliSecond's)</th>
        <th class="danger">Categories</th>
        <th class="info">Limit</th>
        <th class="warning">Visible</th>
        <th class="active">Width</th>
        <th style="background-color:#b3d9ff;">height</th>
        <th style="background-color:#b3c9ba;">AutoPlay</th>
        <th style="background-color:#b3c9ba;">heading</th>
        <th style="background-color:#b3c9ba;">slide Speed</th>
        <th style="background-color:#b3c9ba;">pagination Speed</th>
        <th style="background-color:#b3c9ba;">rewindspeed</th>
        <th style="background-color:#b3c9ba;">stoponhover</th>
        <th style="background-color:#b3c9ba;">navigation</th>
        <th style="background-color:#b3c9ba;">navigationtext</th>
        <th style="background-color:#b3c9ba;">rewindnav</th>
        <th style="background-color:#b3c9ba;">scrollperpage</th>
        <th style="background-color:#b3c9ba;">pagination</th>
        <th style="background-color:#b3c9ba;">paginationnumbeers</th>
        <th style="background-color:#b3c9ba;">lazyload</th>
        <th style="background-color:#b3c9ba;">lazyfollow</th>
        <th style="background-color:#b3c9ba;">lazyeffect</th>
        <th style="background-color:#b3c9ba;">autoheight</th>
        <th style="background-color:#b3c9ba;">mousedrag</th>
        <th style="background-color:#b3c9ba;">touchdrag</th>
        <th style="background-color:#b3d9aa;">Update</th>
      </tr>
    </thead>
    <tbody>
    <?php
   
      $sql="SELECT * FROM `_control`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {


        ?>
      <tr >

      <form method="GET" action="php/update-landing.php?id=<?php echo $result['id'];?>"> 
        <td><input type="text" name="_time" placeholder="<?php echo $result['_time'];?>"></td>
        <td>  <select name="categoryid" >
  <option value=""><?php echo $result['catagories'];?></option>
  <?php
   
      $sql2="SELECT `catagory_name` FROM `catagory`";
      $query2 = mysqli_query($conn,$sql2);
      if($query2)
      {
        while($result2 = mysqli_fetch_assoc($query2))
        {?>
          <option value="<?php echo $result2['catagory_name'];?>"><?php echo $result2['catagory_name'];?></option>


          
        <?php
      }
      }

     ?>
</select></td>
        <td><input type="text" name="_limit" placeholder="<?php echo $result['_limit'];?>"></td>
        <td><input type="text" name="visible" placeholder="<?php echo $result['visible'];?>"></td>
        <td> <input type="text" name="width" placeholder="<?php echo $result['width'];?>"></td>
        <td><input type="text" name="height" placeholder="<?php echo $result['height'];?>"></td>
         <td><select name="autoplay" >
<option><?php echo $result['autoplay'];?></option>
 <option value="yes">YES</option>
 <option value="no">NO</option> 

</select></td>
        <td><input type="text" name="" placeholder="<?php echo $result['heading'];?>"></td>
        <td><input type="text" name="" placeholder="<?php echo $result['slidespeed'];?>"></td>
        <td><input type="text" name="" placeholder="<?php echo $result['paginationspeed'];?>"></td>
        <td><input type="text" name="rewindspeed" placeholder="<?php echo $result['rewindspeed'];?>"></td>
        <td><input type="text" name="stoponhover" placeholder="<?php echo $result['stoponhover'];?>"></td>
        <td><input type="text" name="navigation" placeholder="<?php echo $result['navigation'];?>"></td>
        <td><input type="text" name="navigationtext" placeholder="<?php echo $result['navigationtext'];?>"></td>
        <td><input type="text" name="rewindnav" placeholder="<?php echo $result['rewindnav'];?>"></td>
        <td><input type="text" name="scrollperpage" placeholder="<?php echo $result['scrollperpage'];?>"></td>
        <td><input type="text" name="pagination" placeholder="<?php echo $result['pagination'];?>"></td>
        <td><input type="text" name="paginationnumbeers" placeholder="<?php echo $result['paginationnumbeers'];?>"></td>
        <td><input type="text" name="lazyload" placeholder="<?php echo $result['lazyload'];?>"></td>
        <td><input type="text" name="lazyfollow" placeholder="<?php echo $result['lazyfollow'];?>"></td>
        <td><input type="text" name="lazyeffect" placeholder="<?php echo $result['lazyeffect'];?>"></td>
        <td><input type="text" name="autoheight" placeholder="<?php echo $result['autoheight'];?>"></td>
        <td><input type="text" name="mousedrag" placeholder="<?php echo $result['mousedrag'];?>"></td>
        <td><input type="text" name="touchdrag" placeholder="<?php echo $result['touchdrag'];?>"></td>
<td><input type="submit" name="submit" value="Update This Row" style="padding:5px;">
</td>
</form>
      </tr>

        <?php
      }
      }

     ?>
  </tbody>
  </table>

    </div>

</div>


<div id="home2" class="tab-pane fade">
      <h3>Landing Page Loads/Setting Values</h3>
<div class="table-responsive">
       <table class="table-condensed">
    <thead>
      <tr>
        <th style="background-color:#b3d9aa;">Time(in MilliSecond's)</th>
        <th style="background-color:#b3d9bb;">Categories</th>
        <th style="background-color:#b3d9cc;">Limit</th>
        <th style="background-color:#b3d9dd;">Visible</th>
        <th style="background-color:#b3d9ee;">Width</th>
        <th style="background-color:#b3d9ff;">height</th>
        <th style="background-color:#b3c9ca;">heading</th>
        <th style="background-color:#b3c2ba;">slide Speed</th>
        <th style="background-color:#b3c6ba;">pagination Speed</th>
        <th style="background-color:#b3a2ba;">rewindspeed</th>
        <th style="background-color:#c3c9ba;">stoponhover</th>
        <th style="background-color:#f3c9ba;">  navigation</th>
        <th style="background-color:#b8c9ba;">navigationtext</th>
        <th style="background-color:#b3c9ba;">rewindnav</th>
        <th style="background-color:#b3c9ba;">  scrollperpage</th>
        <th style="background-color:#b3c9ba;">pagination</th>
        <th style="background-color:#b3c9ba;">paginationnumbeers</th>
        <th style="background-color:#b3c9ba;">lazyload</th>
        <th style="background-color:#b3c9ba;">lazyfollow</th>
        <th style="background-color:#b3c9ba;">lazyeffect</th>
        <th style="background-color:#b3c9ba;">autoheight</th>
        <th style="background-color:#b3c9ba;">mousedrag</th>
        <th style="background-color:#b3c9ba;">touchdrag</th>
      </tr>
    </thead>
    <tbody>
    <?php
   
      $sql="SELECT * FROM `_control`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {?>
      <tr >
        <td><?php echo $result['_time'];?></td>
        <td><?php echo $result['catagories'];?></td>
        <td><?php echo $result['_limit'];?></td>
        <td><?php echo $result['visible'];?></td>
        <td><?php echo $result['width'];?></td>
        <td><?php echo $result['height'];?></td>
        <td><?php echo $result['heading'];?></td>
        <td><?php echo $result['slidespeed'];?></td>
        <td><?php echo $result['paginationspeed'];?></td>
        <td><?php echo $result['rewindspeed'];?></td>
        <td><?php echo $result['stoponhover'];?></td>
        <td><?php echo $result['navigation'];?></td>
        <td><?php echo $result['navigationtext'];?></td>
        <td><?php echo $result['rewindnav'];?></td>
        <td><?php echo $result['scrollperpage'];?></td>
        <td><?php echo $result['pagination'];?></td>
        <td><?php echo $result['paginationnumbeers'];?></td>
        <td><?php echo $result['lazyload'];?></td>
        <td><?php echo $result['lazyfollow'];?></td>
        <td><?php echo $result['lazyeffect'];?></td>
        <td><?php echo $result['autoheight'];?></td>
        <td><?php echo $result['mousedrag'];?></td>
        <td><?php echo $result['touchdrag'];?></td>


      </tr>
     
  
          
        <?php
      }
      }

     ?>
  </tbody>
  </table>
  </div>
</div>




  <div id="home3" class="tab-pane fade in">
    <h3>Landing Page Setting's</h3>
    
  
<form method="GET" action="php/landing-page-row-creator.php"> 

  
 <input type="text" name="heading" placeholder="Heading of Row">

  <input type="text" name="_time" placeholder="Time of Slide">

  <select name="categoryid" ><option value="">General</option>
  <?php
   
      $sql="SELECT `catagory_id`,`catagory_name` FROM `catagory`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {?>
          <option value="<?php echo $result['catagory_name'];?>"><?php echo $result['catagory_name'];?></option>


          
        <?php
      }
      }

     ?>
</select>

 <select name="autoplay" >
<option>AutoPlay</option>
 <option value="yes">YES</option>
 <option value="no">NO</option> 
 
</select>

  <input type="text" name="_limit" placeholder="Total Product Load">

  <input type="text" name="visible" placeholder="Limit of Product on Display">

  <input type="text" name="width" placeholder="Width of Product">

<input type="text" name="height" placeholder="Height of Product">

<input type="submit" name="create">

</form>


  </div>
  
</div>

  <h2>Side B Control Setting's</h2>
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#land1">Blank</a></li>
  <li ><a data-toggle="tab" href="#s1">Landing Page Side B Setting Value's</a></li>
  <li ><a data-toggle="tab" href="#s2">Create New Side B Row</a></li>
  <li ><a data-toggle="tab" href="#s6">Update Side B Row</a></li>
</ul>
</ul>

<div class="tab-content">
<div id="s6" class="tab-pane fade in">
  

 <table class="table">
    <thead>
      <tr>
        <th class="success">Time(in MilliSecond's)</th>
        <th class="danger">Categories</th>
        <th class="info">Limit</th>
        <th class="warning">Visible</th>
        <th class="active">Width</th>
        <th style="background-color:#b3d9ff;">height</th>
        <th style="background-color:#b3d9aa;">Update</th>
      </tr>
    </thead>
    <tbody>
    <?php
   
      $sql="SELECT * FROM `_side_b`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {


        ?>
      <tr >

      <form method="GET" action="php/landing-page-row-creator.php"> 
        <td><input type="text" name="_time" placeholder="<?php echo $result['_time'];?>"></td>
        <td>  <select name="categoryid" >
  <option value=""><?php echo $result['catagories'];?></option>
  <?php
   
      $sql2="SELECT `catagory_name` FROM `catagory`";
      $query2 = mysqli_query($conn,$sql2);
      if($query2)
      {
        while($result2 = mysqli_fetch_assoc($query2))
        {?>
          <option value="<?php echo $result2['catagory_name'];?>"><?php echo $result2['catagory_name'];?></option>


          
        <?php
      }
      }

     ?>
</select></td>
        <td><input type="text" name="_limit" placeholder="<?php echo $result['_limit'];?>"></td>
        <td><input type="text" name="visible" placeholder="<?php echo $result['visible'];?>"></td>
        <td> <input type="text" name="width" placeholder="<?php echo $result['width'];?>"></td>
        <td><input type="text" name="height" placeholder="<?php echo $result['height'];?>"></td>
         
<td>
<input type="button" name="create" value="Update This Row" style="padding:5px;">
</td>
</form>
      </tr>

        <?php
      }
      }

     ?>
  </tbody>
  </table>





  




  </div>
  <div id="land1" class="tab-pane fade in active">
  
  </div>
  <div id="s1" class="tab-pane fade">
      <h3>Side B Loads/Setting Values</h3>

       <table class="table">
    <thead>
      <tr>
        <th class="success">Time(in MilliSecond's)</th>
        <th class="danger">Categories</th>
        <th class="info">Limit</th>
        <th class="warning">Visible  (1 is Default Value)</th>
        <th class="active">Width</th>
        <th style="background-color:#b3d9ff;">height</th>
      </tr>
    </thead>
    <tbody>
    <?php
   
      $sql="SELECT * FROM `_side_b`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {?>
      <tr >
        <td><?php echo $result['_time'];?></td>
        <td><?php echo $result['catagories'];?></td>
        <td><?php echo $result['_limit'];?></td>
        <td><?php echo $result['visible'];?></td>
        <td><?php echo $result['width'];?></td>
        <td><?php echo $result['height'];?></td>


      </tr>
     
  
          
        <?php
      }
      }

     ?>
  </tbody>
  </table>



  </div>
  <div id="s2" class="tab-pane fade">
 
<form method="GET" action="php/side_b_insertion.php"> 

  <input type="text" name="_time" placeholder="Time of Slide">

  <select name="categoryid" ><option value="">General</option>
  <?php
   
      $sql="SELECT `catagory_id`,`catagory_name` FROM `catagory`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {?>
          <option value="<?php echo $result['catagory_name'];?>"><?php echo $result['catagory_name'];?></option>


          
        <?php
      }
      }

     ?>
</select>

  <input type="text" name="_limit" placeholder="Total Product Load">



  <input type="text" name="width" placeholder="Width of Product">

<input type="text" name="height" placeholder="Height of Product">

<input type="submit" name="create">

</form>


  </div>
</div>

  <h2>Side A Control Setting's</h2>
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#land2">Blank</a></li>
  <li ><a data-toggle="tab" href="#sa1">Landing Page Side A Setting Value's</a></li>
  <li ><a data-toggle="tab" href="#sa2">Create New Side A Row</a></li>
  <li ><a data-toggle="tab" href="#sa4">Update Side A Row</a></li>
</ul>
</ul>

<div id="sa4" class="tab-pane fade in active">
  

 <table class="table">
    <thead>
      <tr>
        <th class="success">Time(in MilliSecond's)</th>
        <th class="danger">Categories</th>
        <th class="info">Limit</th>
        <th class="warning">Visible</th>
        <th class="active">Width</th>
        <th style="background-color:#b3d9ff;">height</th>
        <th style="background-color:#b3c9ba;">AutoPlay</th>
        <th style="background-color:#b3d9aa;">Update</th>
      </tr>
    </thead>
    <tbody>
    <?php
   
      $sql="SELECT * FROM `_side_a`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {


        ?>
      <tr >

      <form method="GET" action="php/landing-page-row-creator.php"> 
        <td><input type="text" name="_time" placeholder="<?php echo $result['_time'];?>"></td>
        <td>  <select name="categoryid" >
  <option value=""><?php echo $result['catagories'];?></option>
  <?php
   
      $sql2="SELECT `catagory_name` FROM `catagory`";
      $query2 = mysqli_query($conn,$sql2);
      if($query2)
      {
        while($result2 = mysqli_fetch_assoc($query2))
        {?>
          <option value="<?php echo $result2['catagory_name'];?>"><?php echo $result2['catagory_name'];?></option>


          
        <?php
      }
      }

     ?>
</select></td>
        <td><input type="text" name="_limit" placeholder="<?php echo $result['_limit'];?>"></td>
        <td><input type="text" name="visible" placeholder="<?php echo $result['visible'];?>"></td>
        <td> <input type="text" name="width" placeholder="<?php echo $result['width'];?>"></td>
        <td><input type="text" name="height" placeholder="<?php echo $result['height'];?>"></td>
         
<td>
<input type="button" name="create" value="Update This Row" style="padding:5px;">
</td>
</form>
      </tr>

        <?php
      }
      }

     ?>
  </tbody>
  </table>





  




  </div>

<div class="tab-content">
  <div id="land2" class="tab-pane fade in active">
  
  </div>
  <div id="sa1" class="tab-pane fade">
      <h3>Side A Loads/Setting Values</h3>

       <table class="table">
    <thead>
      <tr>
        <th class="success">Time(in MilliSecond's)</th>
        <th class="danger">Categories</th>
        <th class="info">Limit</th>
        <th class="warning">Visible  (1 is Default Value)</th>
        <th class="active">Width</th>
        <th style="background-color:#b3d9ff;">height</th>
      </tr>
    </thead>
    <tbody>
    <?php
   
      $sql="SELECT * FROM `_side_a`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {?>
      <tr >
        <td><?php echo $result['_time'];?></td>
        <td><?php echo $result['catagories'];?></td>
        <td><?php echo $result['_limit'];?></td>
        <td><?php echo $result['visible'];?></td>
        <td><?php echo $result['width'];?></td>
        <td><?php echo $result['height'];?></td>


      </tr>
     
  
          
        <?php
      }
      }

     ?>
  </tbody>
  </table>



  </div>
  <div id="sa2" class="tab-pane fade">
 
<form method="GET" action="php/side_a_insertion.php"> 

  <input type="text" name="_time" placeholder="Time of Slide">

  <select name="categoryid" ><option value="">General</option>
  <?php
   
      $sql="SELECT `catagory_id`,`catagory_name` FROM `catagory`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {?>
          <option value="<?php echo $result['catagory_name'];?>"><?php echo $result['catagory_name'];?></option>


          
        <?php
      }
      }

     ?>
</select>

  <input type="text" name="_limit" placeholder="Total Product Load">



  <input type="text" name="width" placeholder="Width of Product">

<input type="text" name="height" placeholder="Height of Product">

<input type="submit" name="create">

</form>


  </div>
</div>


</body>
</html>