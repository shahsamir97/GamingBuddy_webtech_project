<?php

require $_SERVER['DOCUMENT_ROOT'] . '/model/db_connect.php';

function editSellerDetails($userID, $email, $name, $shopName, $phone, $region, $dob, $gender)
{
    $conn = db_conn();
    $query = "update seller set email='$email', name='$name', shopName='$shopName', phone='$phone', region='$region', dob='$dob', gender='$gender' where userID='$userID'";
    try {
        $conn->exec($query);
        $conn = null;
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        $conn = true;
        return false;
    }
}

function getUserID($email)
{
    $conn = db_conn();
    $query = "select id from seller where email='$email'";
    try {
        $result = $conn->query($query);
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;
        return $row[0]['id'];
    } catch (PDOException $e){
        echo $e->getMessage();
        $conn = null;
        return null;
    }
}

function sellerInfo($userId){
    $conn = db_conn();
    $query = "select * from seller where id='$userId'";
    try {
        $result = $conn->query($query);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;
        return $rows;
    } catch (PDOException $e){
        echo $e->getMessage();
        $conn = null;
        return null;
    }
}