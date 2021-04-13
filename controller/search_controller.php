<?php
require $_SERVER['DOCUMENT_ROOT'] . '/model/product_model.php';

if (isset($_GET['searchText'])) {
    $products = searchProduct($_GET['searchText']);
    if (sizeof($products) > 0) {
        foreach ($products as $key => $product):
            echo "<div class='column' id={$product['id']}>";
            echo "<div class='card' id={$product['id']}>";
            echo "<img id={$product['id']} src={$product['imgUrl']} alt='Product Photo' height='200'/>";
            echo "<h5 id={$product['id']}>{$product['productName']}</h4>";
            echo "<h4 id={$product['id']} class='price-text'>BDT {$product['price']} </h4>";
            echo "</div>";
            echo "</div>";
        endforeach;
    } else {
        echo "<h3>No result found</h3>";
    }

}


