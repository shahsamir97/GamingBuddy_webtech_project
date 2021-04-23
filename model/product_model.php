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

function updateProductInDB($productId, $productName, $productDetails, $price, $category, $imgUrl){
    $conn = db_conn();
    $query = "update product set productName='$productName', productDetails='$productDetails', price='$price', category='$category', imgUrl='$imgUrl' where id='$productId'";
    try {
        $conn->exec($query);
        $conn = null;
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        $conn = null;
        return false;
    }
}

function retrieveAllProducts($sellerId){
        $conn = db_conn();
        $query = "select * from product where sellerId='$sellerId' limit 4";
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

function retrieveProductDetails($productId){
    $conn = db_conn();
    $query = "select * from product where id='$productId'";
    try {
        $result = $conn->query($query);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;
        return $rows[0];
    } catch (PDOException $e){
        echo $e->getMessage();
        $conn = null;
        return null;
    }
}

function searchProduct($searchText, $offset){
    $conn = db_conn();

    $query = "select * from product where productName like '%$searchText%' limit 4 offset {$offset}";
    try {
        $result = $conn->query($query);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;
        return $rows;
    }catch (PDOException $e) {
        echo $e->getMessage();
        $conn = null;
        return null;
    }
}
