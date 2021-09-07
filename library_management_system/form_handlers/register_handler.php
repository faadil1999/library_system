<?php

include 'classes/Reader.php';

$errorFirstname = $errorLastName= $errorNumTel = $errorAdress = $errorPassword="";
$obj = new Reader();
$obj->setFirstName("");
$obj->setLastName("");
$obj->setNumTel("");
$obj->setAdress("");
$obj->setPassword("");

if(isset($_POST['register_button'])){

    $sucess = true;

    if(empty(verifyInput($_POST['first_name']))){
        $errorFirstname = "The first name is empty !";
        $sucess = false ;
    }
    
    if(empty(verifyInput($_POST['last_name']))){
        $errorLastName = "The last name is empty !";
        $sucess = false ;
    }
    
    if(empty(verifyInput($_POST['adresse']))){
        $errorAdress = "The address is empty !";
        $sucess = false ;
    }
    
    if(empty(verifyInput($_POST['password']))){
        $errorPassword = "The password is empty !";
        $sucess = false;
    }

    if(empty(verifyInput($_POST['num_tel']))){
        $errorNumTel = "The tel number is empty !";
        $sucess = false;
    }
    else{
        $obj->setNumTel(verifyInput($_POST['num_tel']));
        if($obj->user_exist() > 0){
            $errorNumTel = "This phone number is already in use";
            $sucess = false ;
        }
    }

    if($sucess == true){
        // we should change the value of our class reader through those function 
        $obj->setFirstName(verifyInput($_POST['first_name']));
        $obj->setLastName(verifyInput($_POST['last_name']));
        $obj->setNumTel(verifyInput($_POST['num_tel']));
        $obj->setAdress(verifyInput($_POST['adresse']));
        $obj->setDateRegistr(date("Y-m-d"));
        $obj->setPassword(verifyInput($_POST['password']));
        //then we can insert all of our values in our data base through function insertReader()
        $obj->insertReader();
        $_SESSION['log_num_tel'] = $obj->getTelNum();
        $_SESSION['log_password'] = $obj->getPassword();
    }

    

};
//this function is for the security of our interface 
function verifyInput($var)
    {
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
        
        return $var ;
    }
?>