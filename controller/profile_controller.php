<?php
require $_SERVER['DOCUMENT_ROOT'] . "/model/seller_profile.php";

function applyProfileEdits($userID, $email, $name, $shopName, $phone, $region, $dob, $gender){
    if (editSellerDetails($userID, $email, $name, $shopName, $phone, $region, $dob, $gender)){
        return true;
    }else{
        return false;
    }
}

function getUserInfo($userId){
    return sellerInfo($userId);
}