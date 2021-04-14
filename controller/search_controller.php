<?php
require $_SERVER['DOCUMENT_ROOT'] . '/model/product_model.php';

if (isset($_GET['searchText'])) {
    $products = searchProduct($_GET['searchText']);
    if (sizeof($products) > 0) {
        foreach ($products as $key => $product):
            echo "<a href='../view/product_view.php?productId={$product['id']}'>";
            echo "<div class='column' >";
            echo "<div class='card'>";
            echo "<img src={$product['imgUrl']} alt='Product Photo' height='200'/>";
            echo "<h5>{$product['productName']}</h4>";
            echo "<h4 class='price-text'>BDT {$product['price']} </h4>";
            echo "</div>";
            echo "</div>";
        endforeach;
    } else {
        echo "<h3>No result found</h3>";
    }

}


