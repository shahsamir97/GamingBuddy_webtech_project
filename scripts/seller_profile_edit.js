var nameOk = false;
var shopNameOk = false;
var emailOk = false;
var phoneOk = false;
var dobOk = false;

function verifyShopName(){
    var shopName = document.getElementById("shopName").value
    var shopNameErr = document.getElementById("shopNameErr")
    if (shopName == ""){
        shopNameOk = false;
        shopNameErr.innerHTML = "Shop name cannot be empty!"
    }else{
        shopNameOk = true;
        shopNameErr.innerText = null;
    }
}

function verifyName(){
    var name = document.getElementById("name").value
    var nameErr = document.getElementById("nameErr")
    if (name == ""){
        nameOk = false;
        nameErr.innerHTML = "Name cannot be empty!"
    }else{
        nameOk = true;
        nameErr.innerText = null;
    }
}

function verifyEmail(){
    var email = document.getElementById("email").value
    var emailErr = document.getElementById("emailErr")
    if (email == ""){
        emailOk = false;
        emailErr.innerHTML = "Email cannot be empty!"
    }else{
        emailOk = true;
        emailErr.innerText = null;
    }
}

function verifyPhone(){
    var phone = document.getElementById("phone").value
    var phoneErr = document.getElementById("phoneErr")
    if (phone == ""){
        phoneOk = false;
        phoneErr.innerHTML = "Phone cannot be empty!"
    }else{
        phoneOk = true;
        phoneErr.innerText = null;
    }
}


function verifyDob(){
    var dob = document.getElementById("dob").value
    var dobErr = document.getElementById("dobErr")
    if (dob == ""){
        dobOk = false;
        dobErr.innerHTML = "dob cannot be empty!"
    }else{
        dobOk = true;
        dobErr.innerText = null;
    }
}

function validateForm(){
    if (nameOk && emailOk && phoneOk && dobOk){
        return true
    }else {
        alert("Wrong Input! Please check the form again")
        verifyEmail()
        verifyName()
        verifyShopName()
        verifyDob()
        verifyPhone()
        return false
    }
}