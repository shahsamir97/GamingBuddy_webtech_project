<?php
require $_SERVER['DOCUMENT_ROOT'] . '/model/db_connect.php';

function addProductToDb($userId, $productName, $productDetails, $price,$category,$imgUrl){
    $conn = db_conn();
    $query = "INSERT INTO product (id,sellerId, productName, productDetails, price,category, imgUrl) values (UUID_SHORT(), '$userId','$productName', '$productDetails', '$price','$category', '$imgUrl')";
    try{
        $conn->exec($query);
    }catch(PDOException $e){
        echo $e->getMessage();
        return false;
    }
    $conn = null;
    return true;

}