document.getElementById("editButton").addEventListener('click', doSomething)

function doSomething($productId) {
    alert("clicked")
    window.location.href = "../view/edit_product.php?productId=" + $productId
}