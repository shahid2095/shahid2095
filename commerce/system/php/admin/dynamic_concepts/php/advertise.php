<?php  

include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";


$get_product = "SELECT * FROM `advertisment` WHERE `page` = '".$_GET['page']."' ";
$get_query = mysqli_query($conn,$get_product);
$get_result = mysqli_fetch_assoc($get_query);

$i = $get_result['switch'];

if($i == 'on')
{

?>
<div id="whole_screen" style="position: absolute;bottom: 0%;width: 100%;min-height:100%;height: auto;opacity: 0.3;z-index: 10000;background-color: #000000;"></div>

<div class="modal" id="myModal" style="z-index: 10001;">
  <div class="modal-dialog">
 
      <div class="modal-content">
             <div class="modal-body">

               <span style="color:#ff6600" class="modal-title">
               <h3>Sponsered Advertisement</h3>
               </span>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            
            <a href="<?php echo $get_result['anchor'];?>"><img src="system/php/admin/dynamic_concepts/<?php echo $get_result['file_path'];?>" style="width: 100%;height:100%;" class="img img-responsive"></a>      


        </div>
      </div>
    </div>
</div>



<script type="text/javascript">
  $('document').ready(function(){
  $('#myModal').show();
  $('#myModal').delay("<?php echo $get_result['duration_appear'];?>").fadeOut(function(){
     $('#whole_screen').hide();
  });
  $('.close').click(function(){
    $('#myModal').hide();
    $('#whole_screen').hide();
  });

});
</script>



<?php

}

?>



