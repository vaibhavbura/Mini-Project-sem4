<?php

function check_login($con)
{
    if(isset($_SESSION['gmail']))
{
    $gmail= $_SESSION['gmail'];
    $query= "Select * from signup where gmail= '$gmail' limit 1";

    $result= mysqli_query($con,$query);
    if($result && mysqli_num_rows($result)>0)
    {
        $user_data= mysqli_fetch_assoc($result);
        return $user_data;
    }
}

//redirect to login
header("Location: login.php");
die;
}