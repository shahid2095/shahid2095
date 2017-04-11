<?php
                



                      if($_GET['pincode']=='')
                      {
                        echo "<span style='box-shadow:0px 0px 1px red;padding:6px;margin:1px;font-weight:bold;font-size:14px;color:red;transform: scale(1.5, 1.5);'>* Required</span>";
                      }
                      else
                      {
                      $check_pincode = "SELECT * FROM `delivery_pincodes` WHERE `pincode` = ".$_GET['pincode']." AND `productid` =".$_GET['product_id']." ";
                        $yah = mysqli_query($conn,$check_pincode);
                        $row_cnt = mysqli_num_rows($yah);

         if($row_cnt >= 1)
         {
          echo "<img src='system/media/yes.png' id='pin' width='20px' height='20px'>";
         }
          else if($row_cnt<=0)
          {
          echo "<img src='system/media/wrong.png' id='pin' width='20px' height='20px'>";
         }   
                    }
              
                                             
           ?>