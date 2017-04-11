<nav class="navbar navbar-inverse" style="border-radius: 0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Index Page</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../../../../index.php">Home</a></li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Display Products
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="logging_productsH.php">On Home</a>
          </li>
          <li><a href="logging_productsD.php">On Description</a></li>
          <li><a href="logging_productsGR.php">Suggestion on G/R</a></li> 
        </ul>
      </li>
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Resturants
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="logging_productsH.php">Orders</a></li>
          <li><a href="logging_productsD.php">Vendors</a></li>
          <li><a href="logging_productsGR.php">Products</a></li> 
        </ul>
      </li>  <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Grocery
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="logging_productsH.php">Orders</a></li>
          <li><a href="logging_productsD.php">Vendors</a></li>
          <li><a href="logging_productsGR.php">Products</a></li> 
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Shippers
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Add New Shippers</a></li>
          <li><a href="#">Edit Shippers</a></li>
          <li><a href="#">Ban / Remove</a></li> 
        </ul>
      </li>
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="orderssearch.php?&limit=10">Search Order's</a></li>
          <li><a href="ordersnew.php?status=&limit=10&filter_type=limit">All Order's</a></li>
          <li><a href="ordersnew.php?status=new&limit=10&filter_type=limit">New Order's</a></li>
          <li><a href="ordersnew.php?status=pending&limit=10&filter_type=limit">Pending</a></li>
          <li><a href="ordersnew.php?status=canceled&limit=10&filter_type=limit">Cenceled</a></li> 
          <li><a href="ordersnew.php?status=return&limit=10&filter_type=limit">Return Requests</a></li> 
        </ul>
      </li> <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Payment
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Pay Bill's</a></li>
          <li><a href="#">Recived Payment's</a></li>
          <li><a href="#">Pending Payment's</a></li> 
        </ul>
      </li> <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Message Center
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="chat_room.php">From Vendors</a></li>
          <li><a href="Notifications.php">Notifications</a></li>
        </ul>
      </li> <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">SMS
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="sms.php">Send SMS</a></li>
          <li><a href="#">Group SMS</a></li>
        </ul>
      </li> <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Product
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="productsD.php">All Products</a></li>
          <li><a href="productsU.php">Update Products</a></li>
          <li><a href="product-input.php">Add Simple products</a></li>
          <li><a href="product-input-linked.php">Add Linked products</a></li>
          <li><a href="productsR.php">Remove Products</a></li> 
        </ul>
      </li> <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Vendors
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Vendors Request</a></li>
          <li><a href="#">All Vendor / Settings</a></li>
          <li><a href="#">Update Information</a></li> 
          <li><a href="#">Remove / ban Vendors</a></li> 
        </ul>
      </li> <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Generate Invoice</a></li>
          <li><a href="#">Generate Sales Report</a></li>
        </ul>
      </li> <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Advertisement
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="ads.php">Add Ads</a></li>
          
        </ul>
      </li> <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Setting's
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li><a href="landing-control.php">Front Page Layout</a></li>
          <li><a href="#">Image Zoom Setting</a></li>
          <li><a href="#">Default Value's</a></li>
          <li><a href="payment-gateway.php">Payment GateWay</a></li>
          <li><a href="coupon_code.php">Generate Coupon's / Credit Point's</a></li>
          <li><a href="attributes.php">Attributes</a></li>
          <li><a href="image_mag.php">Product Image</a></li>
          <li><a href="session.php">Session variables</a></li>
        </ul>
      </li> 
    </ul>
  </div>
</nav>
<script type="text/javascript">

</script>
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";?>
