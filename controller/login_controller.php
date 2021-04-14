<?php
require $_SERVER['DOCUMENT_ROOT'] . '/model/authentication.php';

function signIn($email, $password)
{
    $result = loginUser($email, $password);
    if (sizeof($result) < 1) {
        //login unsuccessful
        return null;
    } else {
        //login successful
        return $result[0]['id'];
    }
}

function saveLoginInfo($userId, $ipAddress, $time): bool
{
    if (storeLoginInfo($userId, $ipAddress, $time)) {
        return true;
    } else {
        return false;
    }
}