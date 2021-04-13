var cards = document.querySelector("#product_list")

cards.addEventListener('click', doSomething, false)

function doSomething(e) {
    if (e.target !== e.currentTarget) {
        window.location.href = "../view/product_view.php?productId=" + e.target.id
        e.stopPropagation()
    }
}


function searchProduct() {
    var text = document.getElementById('searchBox').value
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("product_list").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../controller/search_controller.php?searchText=" + text, true);
    xhttp.send();
}



