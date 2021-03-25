<?php

require $_SERVER['DOCUMENT_ROOT'] . "/model/product_model.php";

function addProduct($sellerId, $productName, $productDetails, $price ,$category, $imgUrl){
    if (addProductToDb($sellerId, $productName, $productDetails, $price, $category, $imgUrl)) {
        return true;
    }else{
        return false;
    }
}
