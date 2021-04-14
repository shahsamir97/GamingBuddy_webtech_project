
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



