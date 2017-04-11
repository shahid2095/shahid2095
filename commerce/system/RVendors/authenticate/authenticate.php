<?php
session_start();
$duration=999960;
if(isset($_POST['login']))
{
    $username=$_POST["username"];
    $password=$_POST["password"];

    if($username!="" AND $password !="")
        
    {
        $con=mysqli_connect("localhost","root","123456","cartcros");
        $sql="select * from sellers_active where email_id='$username' AND pass='$password'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==1)
        {
            
             $db=mysqli_fetch_assoc($result);
        $_SESSION["loggedin"]=array(
        "start"=>time(),
            "duration"=>$duration,
            "name"=>$db["email_id"]);
       header("Location: home.php");
            
        }
         else
        {
             header("Location: login.php?status=error&msg=Incorrect Username/Password");
            
        }
       
    }
    else
    {
         header("Location: login.php?status=error&msg=Missing Username or password");
    }
   
}

    ?>