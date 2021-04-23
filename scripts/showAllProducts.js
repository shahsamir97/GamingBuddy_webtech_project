var offset = 0
var response = true

function searchProduct() {
    var text = document.getElementById('searchBox').value
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === "<h3>No result found</h3>"){
                response = false
            }else{
                response = true
            }
            document.getElementById("product_list").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../controller/search_controller.php?searchText=" + text +"&offset="+offset, true);
    xhttp.send();
}


function next(){
    if (response){
        offset += 4
        searchProduct()
    }
}

function previous(){
    if (offset > 0){
        offset -= 4
        searchProduct()
    }
}