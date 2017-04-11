<div class='navbar' style="padding:0px;margin:0px;">
<div class='navbar navbar-inverse navbar-bottom' style="padding:0x;margin:0px;" >






 <div class="row" style="color:#ffffff">
                <div class="col-lg-12">
    			<div class="col-lg-3 col-md-6">
                <div class="container">
	


            <div class="col-lg-3 col-md-6">
			<h3>Website Map:</h3>
                <ul>
				  <?php
   
      $sql="SELECT `catagory_id`,`catagory_name` FROM `catagory`";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        while($result = mysqli_fetch_assoc($query))
        {?>
          <li><a href="#"><?php echo $result['catagory_name'];?></a></li>


          
        <?php
      }
      }

     ?>
				</ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h3>Contact:</h3>
				<p>Have a question or feedback? Contact us!</p>
				<p><a href="" title="Contact us!"><i class="fa fa-envelope"></i> Contact </a> +91000000000</p>
				<p><a href="" title="Mail us!"><i class="fa fa-envelope"></i> Mail </a> Mail@stepdoor.com</p>
            <h3>Follow:</h3>
			
			
<a href="" id="gh" target="_blank" title="Twitter"><span class="fa-stack fa-lg">
  <i class="fa fa-square-o fa-stack-2x"></i>
  <i class="fa fa-twitter fa-stack-1x"></i>
</span>
Twitter</a>
<a href=""  target="_blank" title="Facebook"><span class="fa-stack fa-lg">
  <i class="fa fa-square-o fa-stack-2x"></i>
  <i class="fa fa-github fa-stack-1x"></i>
</span>
Facebook</a>

		


		
			
			</div>
			<br/>
            <div id="fb-root"></div>

			<br/>
			
				<hr>
                    <p>Copyright &copy; www.stepdoor.in | <a href="">Privacy Policy</a> | <a href="">Terms of Use</a></p>
					








</div>
</div>