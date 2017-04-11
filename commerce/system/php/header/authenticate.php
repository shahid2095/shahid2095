<?php

    session_start();
     include $_SERVER['DOCUMENT_ROOT'] . "/commerce/system/database/connection.php";

     $get_session="select * from session_variables where id = 1";

            $get_session_array=mysqli_query($conn,$get_session);

            $get_session_time = mysqli_fetch_assoc($get_session_array);

    $duration=$get_session_time['value'];

        $username = $_POST['email'];
        $password = $_POST['password'];
        if($username!="" AND $password !="")
            
        {
            $conn=mysqli_connect("localhost","root","","ecom");

            $sql="select * from customers where email='".$username."' AND password='".$password."'";

            $result=mysqli_query($conn,$sql);

            $db = mysqli_fetch_assoc($result);

            $row = mysqli_num_rows($result);
       		if($row)
       		{
            $_SESSION["loggedin"]=array(
            	"start"=>time(),
                "duration"=>$duration,
                "id"=>$db["customerid"],
                "firstname"=>$db["firstname"],
                "lastname"=>$db["lastname"],
                "email"=>$db["email"],
                "postalcode"=>$db["postalcode"],
                "phone"=>$db["phone"]);

                    header("location:../../../index.php");
          
                }
                else
                {
                	header("location:../../../login.php?status=Session Expired");
                }
       
        }
        else
        {
            header("location:../../../login.php?status=Enter username/password");
        }
        

    
    
    ?>