<?php
require $_SERVER['DOCUMENT_ROOT']."/model/authentication.php";


function createUser($email, $password, $name, $shopName,$phone, $region, $dob, $gender){
    if(registerUser($email, $password, $name, $shopName, $phone, $region, $dob, $gender)){
        //when registration successful
       return true;
    }else{
        //when registration unsuccessful
        return false;
    }
}

function doesEmailAlreadyExist($email){
    if (checkEmailExists($email)){
        echo "Email already exist";
        return true;
    }else{
        echo false;
        return false;
    }
}

if (isset($_GET['email'])){
    doesEmailAlreadyExist($_GET['email']);
}