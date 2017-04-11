<?php	

$id = $_GET['id'];
$comment = "SELECT * FROM `comment_database`  WHERE productid = '".$id."' ORDER BY id desc LIMIT 10 ";
$query_comment = mysqli_query($conn,$comment);

?>

	<div class="row container-fluid">
			<div class="col-sm-7">
				<hr/>
				<div class="review-block">
<style type="text/css">
	div img
	{

	}
</style>


<?php

       if($query_comment)
      {
        while($result_comment = mysqli_fetch_assoc($query_comment))
        		{


        			$sub_c = "SELECT * FROM `sub_cmnt_database` WHERE `cmnt_id` = ".$result_comment['id']."";
					$query_sub = mysqli_query($conn,$sub_c);
					$sub_comment_cnt = mysqli_num_rows($query_sub);


        	?>

					<div class="row">
						<div class="col-sm-3">
							<img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded comment-img">
							<div class="review-block-name"><a href="#"><?php echo $result_comment['customerid'];?></a></div>
							<div class="review-block-date"><?php echo $result_comment['commented_on'];?></div>
						</div>
						<div class="col-sm-9">
						
							
							<div class="review-block-description"><?php echo $result_comment['msg'];?></div>
							<div style="color: blue;cursor: pointer;display: inline;" id="rply<?php echo $i;?>">replay</div><i class="fa fa-star-o"></i>
								<div class="row">
					<div class="col-md-6">

					<div style="margin-top: 1%;width: 800px;display: none;" id="replay<?php echo $i;?>">
								<textarea id="replay_text" style="width: 800px;border-style: solid;border-width: thin;border-color:#000ff0;border-radius: 5px;"></textarea>
								<button id="post_comment<?php echo $i;?>" class="btn btn-default">Post comment</button>
							</div>
						
					</div>
							<div class="col-md-6"></div>
					</div>
							
						</div>
					</div>



					<?php

						 if($query_sub)
							      {
							        while($result_sub_comment = mysqli_fetch_assoc($query_sub))
							        		{



										?>
					<div class="row">
					<div class="col-md-1"></div>
				
					<div class="col-md-3">
						<img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded comment-img">
							<div class="review-block-name"><a href="#"><?php echo $result_comment['customerid'];?></a></div>
							<div class="review-block-date"><?php echo $result_comment['commented_on'];?></div>


					</div>
					<div class="col-md-8">

					<div >



							<div class="review-block-description"><?php echo $result_sub_comment['msg'];?></div>


				
					<hr/>

		</div>
						
					</div>
						
					</div>
								
								<?php
									}

								}



								?>

					





				<hr>	

        <?php
        $i++;
      			}
  			}




      ?>

      <span style="margin-top:20px;margin-bottom: 20px;padding:10px;box-shadow: 0px 0px 5px gray;"><a href="#">More Comments</a></span>

</div>
			</div>
		</div>

		<?php?>


		<script type="text/javascript">
		<?php
for($i=1;$i<=$comment_cnt;$i++)
{

?>
  $("#rply<?php echo $i;?>").click(function(){

    $("#replay<?php echo $i;?>").css("display","block");

  });
   $("#post_comment<?php echo $i;?>").click(function(){

    $("#replay<?php echo $i;?>").css("display","none");

  });

  <?php

}
?>
		</script>