<?php

$errorTel = $errorPasswordLog = "";
$_SESSION['log_num_tel'] = "";
$_SESSION['log_password'] = "";
$obj = new Reader();
$obj->setNumTel("");
$obj->setPassword("");

if(isset($_POST['login_button']))
{
    $sucess = true;
    if(empty(verifyInput($_POST['num_tel'])))
    {
        $errorTel = "Your phone is empty !";
        $sucess = false;
    }

    if(empty(verifyInput($_POST['password'])))
    {
        $errorPasswordLog = "Your password is empty !";
        $sucess = false;
    }

    if(verifyInput($_POST['num_tel'])!=null && verifyInput($_POST['password'])!=null)
    {
        $obj->setNumTel(verifyInput($_POST['num_tel']));
        $obj->setPassword(verifyInput($_POST['password']));
        
        if($obj->user_exist_login() == 0)
        {
            $errorPasswordLog = "Your phone number or  password is not correct !";
            $sucess = false;
        }
    }

    if($sucess == true)
    {   $_SESSION['log_num_tel'] = $obj->getTelNum();
        $_SESSION['log_password'] = $obj->getPassword();
 
        header("Location:profil.php");
    }

}


?>