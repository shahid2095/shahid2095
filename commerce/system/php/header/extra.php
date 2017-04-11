<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

   <script type="text/javascript">
  
$(document).ready(function(){

  

  $("#search").keyup(function(){

    var term = $("#search").val();



      if(term == '')
      {
         $("#result").css("display","none");
      }
      if(term != null)
      {


    $.get("inc/ajax-search.php",{searchkey:term},function(data){
      $("#result").html(data);
    });
    $("#result").css("display","block");



    $("body").click(function(){
      $("#result").css("display","none");

    });

      }
  });

 $('html').keyup(function(e){if(e.keyCode == 8)
  {
    $("#result").css("display","none");
  }
});
});


</script> 
 <div class="menu-container">

        <div class="menu ">

            <ul>

                
                <li style="background-color:#000000 ;"><a href="#" style="font-size: 18px;font-weight: bold;color:#ffffff;">Categories</a>

                    <ul style="background-color: #ffffff;box-shadow: 0px 0px 5px gray;font-size: 18px;margin-top: 1%;z-index: 21000;">
                       
                      

              <?php
              include "connection.php";
                

                 $sql="SELECT `catagory_id`,`catagory_name`,`description` FROM `catagory`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {
      $sql2="SELECT `catagory_name`,`sub_catagory_id` FROM `sub_catagory` WHERE catagory_id = ".$result['catagory_id']." ";
      $query2 = mysqli_query($conn,$sql2);


          ?>
          <li ><a href="fmscinn.php?category=categoryid&id=<?php echo $result['catagory_id'];?>" style="color:#000000;font-weight: bold;"><?php echo $result['catagory_name'];?></a><ul>
          
                
              <?php
               if($query2)
      {
        while($result2 = mysqli_fetch_assoc($query2))
        {
          ?>
             
                <li style="font-size: 16px;margin:0px;"><a href="fmscinn.php?category=sub_categoryid&id=<?php echo $result2['sub_catagory_id'];?>" style="padding:0px;margin:0px;"><?php echo $result2['catagory_name'];?></a></li>
              
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







                    </ul>
                </li>
             
            </ul>






        </div>


        <div>
<form action="view_products.php" method="get">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">

<div  style="margin-top:0px;padding-top:0px;">


  <input type="text" class="form-control" name="searchkey" placeholder="Search" id='search' style="position: absolute;bottom: 2%;">
  <input type="hidden" name="submit" value="view_grid">
 
</div>
</div>
<div class="col-md-2">
  <button type="submit" class="btn btn-warning" style="color:black;padding:7px;position: absolute;bottom: 1%;">
      <span class="glyphicon glyphicon-search"></span>
    </button>
  

  </div>


</div>
</form>
</div>

<div class="row" style="color:white;font-weight:bold;">
<div class="col-md-1" >
</div>
 <div class="col-md-1" >
</div>
<div class="col-md-8">
  <a href="index.php" style="color:white;padding-right:10px;">     Home</a>
  <a href="food_store.php" style="color:white;padding-right:10px;">     Order Food</a>
  <a href="whole.php" style="color:white;padding-right:10px;">     Whole Sale Product's</a>
  <a href="" style="color:white;"></a>
  </div>
  <div class="col-md-2" >
      <a href="sign_in.php" style="color:white;padding-right:10px;">Your Wishlist</a>
        <a href="sign_in.php" style="color:white;" id="cart-drop">      Cart</a>
</div>

</div>
            



</div>
  <div class="row" >
<div class="col-md-2"></div>
<div class="col-md-8" >

<div id="result" style="position:absolute;top:-10%;z-index: 1000;width:100%;height: 300px;background-color: #ffffff;box-shadow:0px 0px 5px gray ;display:none;padding: 2%;">
     
   </div>
 
</div>

<div class="col-md-2"></div>

</div>


    <style type="text/css">
      /* 
- Name: megamenu.js - style.css
- Version: 1.0
- Latest update: 29.01.2016.
- Author: Mario Loncarek
- Author web site: #
*/


/* ––––––––––––––––––––––––––––––––––––––––––––––––––
Body - not related to megamenu
–––––––––––––––––––––––––––––––––––––––––––––––––– */
 .menu ul li ul
    {
      width:80%;
      margin-left:10%;
    }

.description {
  width: 80%;
  margin: 50px auto;
}


/* ––––––––––––––––––––––––––––––––––––––––––––––––––
megamenu.js STYLE STARTS HERE
–––––––––––––––––––––––––––––––––––––––––––––––––– */


/* ––––––––––––––––––––––––––––––––––––––––––––––––––
Screen style's
–––––––––––––––––––––––––––––––––––––––––––––––––– */

.menu-container {
  width: 100%;
  margin: 0 auto;
  background: #000000;
}

.menu-mobile {
  display: none;
  padding: 20px;
  &:after {
    content: "\f394";
    font-size: 18px;
    padding: 0;
    float: right;
    position: relative;
    top: 50%;
    transform: translateY(-25%);
  }
}

.menu-dropdown-icon {
  &:before {
    content: "\f489";
    display: none;
    cursor: pointer;
    float: right;
    padding: 1.5em 2em;
    background: black;
    color: #333;
  }
}

.menu {
  > ul {
    margin: 0 auto;
    width: 100%;
    list-style: none;
    padding: 0;
    position: relative;
    //position: relative;
    /* IF .menu position=relative -> ul = container width, ELSE ul = 100% width */
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;

    &:before,
    &:after {
      content: "";
      display: table;
    }
    &:after {
      clear: both;
    }
    > li {
      float: left;
      background:blue;
      padding: 0;
      margin: 0;
      a {
        text-decoration: none;
        padding: 1.5em 3em;
        display: block;
      }
      &:hover {
        background: green;
      }
      > ul {
        display: none;
        width: 100%;
        background: red;
        padding: 20px;
        position: absolute;
        z-index: 99;
        left: 0;
        margin: 0;
        list-style: none;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        &:before,
        &:after {
          content: "";
          display: table;
        }
        &:after {
          clear: both;
        }
        > li {
          margin: 0;
          padding-bottom: 0;
          list-style: none;
          width: 25%;
          background: none;
          float: left;
          a {
            color: #777;
            padding: .2em 0;
            width: 95%;
            display: block;
            border-bottom: 1px solid #ccc;
          }
          > ul {
            display: block;
            padding: 0;
            margin: 10px 0 0;
            list-style: none;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            &:before,
            &:after {
              content: "";
              display: table;
            }
            &:after {
              clear: both;
            }
            > li {
              float: left;
              width: 100%;
              padding: 10px 0;
              margin: 0;
              font-size:16px;
              a {
                border: 0;
              }
            }
          }
        }
        &.normal-sub {
          width: 300px;
          left: auto;
          padding: 10px 20px;
          > li {
            width: 100%;
            a {
              border: 0;
              padding: 1em 0;
            }
          }
        }
      }
    }
  }
}


/* ––––––––––––––––––––––––––––––––––––––––––––––––––
Mobile style's
–––––––––––––––––––––––––––––––––––––––––––––––––– */

@media only screen and (max-width: 959px) {
  .menu-container {
    width: 100%;
  }
  .menu-mobile {
    display: block;
  }
  .menu-dropdown-icon {
    &:before {
      display: block;
    }
  }
  .menu {
    > ul {
      display: none;
      > li {
        width: 100%;
        float: none;
        display: block;
        a {
          padding: 1.5em;
          width: 100%;
          display: block;
        }
        > ul {
          position: relative;
          &.normal-sub {
            width: 100%;
          }
          > li {
            float: none;
            width: 100%;
            margin-top: 20px;
            &:first-child {
              margin: 0;
            }
            > ul {
              position: relative;
              > li {
                float: none;
              }
            }
          }
        }
      }
    }
    .show-on-mobile {
      display: block;
    }
  }
}
    </style>

    <script type="text/javascript">
      $(document).ready(function() {

  "use strict";

  $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
  //Checks if li has sub (ul) and adds class for toggle icon - just an UI

  $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
  //Checks if drodown menu's li elements have anothere level (ul), if not the dropdown is shown as regular dropdown, not a mega menu (thanks Luka Kladaric)

  $(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\">Navigation</a>");

  //Adds menu-mobile class (for mobile toggle menu) before the normal menu
  //Mobile menu is hidden if width is more then 959px, but normal menu is displayed
  //Normal menu is hidden if width is below 959px, and jquery adds mobile menu
  //Done this way so it can be used with wordpress without any trouble

  $(".menu > ul > li").hover(function(e) {
    if ($(window).width() > 943) {
      $(this).children("ul").stop(true, false).fadeToggle(150);
      e.preventDefault();
    }
  });
  //If width is more than 943px dropdowns are displayed on hover

  $(".menu > ul > li").click(function() {
    if ($(window).width() <= 943) {
      $(this).children("ul").fadeToggle(150);
    }
  });
  //If width is less or equal to 943px dropdowns are displayed on click (thanks Aman Jain from stackoverflow)

  $(".menu-mobile").click(function(e) {
    $(".menu > ul").toggleClass('show-on-mobile');
    e.preventDefault();
  });
  //when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story (thanks mwl from stackoverflow)

});
          </script>