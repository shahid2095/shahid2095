<?php

    if(isset($_POST['bulk_delete_submit']))
    {
        $idArr = $_POST['checked_id'];

        foreach($idArr as $id)
        {
           $image_query = "SELECT picture,small,thumb FROM `products` WHERE productid =".$id;
            $fetch = mysqli_query($conn,$image_query);
            $get_image = mysqli_fetch_assoc($fetch);
           
            mysqli_query($conn,"DELETE FROM products WHERE productid=".$id);
           
            unlink('../../../../'.$get_image['picture']);
            unlink('../../../../'.$get_image['thumb']);
            unlink('../../../../'.$get_image['small']);
         
        }

    }
?>