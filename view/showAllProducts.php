<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../styles/showAllProduct_style.css">
</head>
<body>
<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/controller/product_controller.php";

$products = getAllProducts($_SESSION['userId']);
include "../view/header.php";
?>

<div class="head-line">
    <h2>Products</h2>
</div>

<div class="search-box">
    <input id="searchBox" class="search-box-input" type="search"  placeholder="Search Products" aria-label="Search"
           aria-describedby="search-addon" onkeyup="searchProduct(<?php echo $_SESSION['userId']?>)"/>
    <button id="searchButton" class="search-box-button" type="button">search</button>
</div>


<div class="product-list">
    <div class="row" id="product_list">
        <?php foreach ($products as $key => $product): ?>
            <a href="../view/product_view.php?productId=<?php echo $product['id']?>">
                <div class="column">
                <div class="card">
                    <img src="<?php echo $product['imgUrl'] ?>" alt="Product Photo"
                         height="200"/>
                    <h5><?php echo $product['productName'] ?></h5>
                    <h4 class="price-text">BDT <?php echo $product['price']?> </h4>
                </div>
            </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>
<div class="flex-container">
    <button class="outlined-button" onclick="previous()">&laquo; Previous</button>
    <button class="next" onclick="next()">Next &raquo;</button>
</div>

<div class="flex-container">
    <a class="outlined-button" href="../view/seller_profile.php">Back To Profile</a>
</div>
<footer>
    <?php include "../view/footer.php" ?>
</footer>
<script src="../scripts/showAllProducts.js"></script>
</body>
</html>
