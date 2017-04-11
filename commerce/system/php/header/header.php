
<div class="navbar navbar-default navbar-fixed-top">

<style type="text/css">
 h1
 {
       color:#ffffff;
 }
 .btn-group-warning .dropdown-menu {
  background-color: #efa640 !important;
}
.btn-group-warning .dropdown-menu li > a:hover,
.btn-group-warning .dropdown-menu li > a:focus {
  background-color: #f0ad4e !important;
}
</style>

<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";
if(isset($_SESSION['loggedin']))
    {



         
    $duration=$_SESSION["loggedin"]["duration"];
    $start=$_SESSION["loggedin"]["start"];
    if((time()-$start)>$duration)
    {
      
        unset($_SESSION["loggedin"]);
        header("Location: index.php?status=expire&msg=Session Expired");
        

       
    }
    else
    {
         
         ?>
           <div class="btn-group btn-group-warning pull-right">
    <button class="btn btn-warning" type="button"><?php echo $_SESSION["loggedin"]['firstname'];?></button>
    <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle" type="button"><span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
     <li><a href="#">your orders</a></li>
          <li><a href="#">your wishlist</a></li>
      <li class="divider"></li>
      <li><a href="system/php/header/destroy_session.php">Logout</a></li>
    </ul>
  </div>

         <?php
    }
    echo '';
    }

   else
   {
  
    ?>
        <ul class="nav navbar-nav navbar-right" style="position: relative;right: 100px;font-size: 18px;">
        <li class="dropdown">
        <a class="dropdown-toggle" href="login.php">Login</a>
      
      </li>
      </ul>

    <?php
   }
    
    
    ?>


      </div>
