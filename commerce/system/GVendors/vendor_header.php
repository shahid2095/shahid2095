<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Index Page</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>

  
   
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="orders/ordersS.php">Search Order's</a></li>
          <li><a href="orders/ordersS.php">All Order's</a></li>
          <li><a href="orders/ordersN.php">New Order's</a></li>
          <li><a href="orders/ordersP.php">Pending</a></li>
          <li><a href="orders/ordersC.php">Cenceled</a></li> 
          <li><a href="orders/ordersR.php">Return Requests</a></li> 
        </ul>
      </li> <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Payment
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Pay Bill's</a></li>
          <li><a href="#">Recived Payment's</a></li>
          <li><a href="#">Pending Payment's</a></li> 
        </ul>
      </li> 
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Product
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="products/productsD.php">All Products</a></li>
          <li><a href="products/productsU.php">Update Products</a></li>
          <li><a href="products/product-input.php">Add products</a></li>
          <li><a href="products/productsR.php">Remove Products</a></li> 
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="reports/invoice.php">Generate Invoice</a></li>
          <li><a href="reports/report.php">Generate Sales Report</a></li>
        </ul>
      </li>

    </ul>
  </div>
</nav>
<?php  include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";?>
