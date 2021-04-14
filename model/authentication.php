<?php

require $_SERVER['DOCUMENT_ROOT']."/model/db_connect.php";

function registerUser($email, $password, $name, $shopName,$phone, $region, $dob, $gender){
    $conn = db_conn();
    $query = "INSERT INTO seller (id, email, password, name, shopName, phone, region, dob, gender) values (UUID_SHORT(), '$email', '$password', '$name', '$shopName', '$phone','$region', '$dob', '$gender')";
    try{
         $conn->exec($query);
    }catch(PDOException $e){
        echo $e->getMessage();
        return false;
    }
    $conn = null;
     return true;
}

function loginUser($email, $password){
    $conn = db_conn();
    $query = "SELECT * FROM seller where email='$email' and password='$password'";
    try{
        $result = $conn->query($query);
    }catch(PDOException $e){
        echo $e->getMessage();
        return false;
    }
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $rows;
}

function checkEmailExists($email){
    $conn = db_conn();
    $query = "select email from seller where email='$email'";
    try {
        $result = $conn->query($query);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;
        if (sizeof($rows) > 0){
            //when email exists
            return true;
        }else{
            //when email doest not exits
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

function storeLoginInfo($userId, $ipAddress, $time){
    if (file_exists('../storage/loginInfo.json')){
        $current_data = file_get_contents('../storage/loginInfo.json');
        $array_data = json_decode($current_data, true);
        $data = array(
            'userId' => $userId,
            'ipAddress' => $ipAddress,
            'time' => $time
        );
        $array_data[] = $data;
        $final_data = json_encode($array_data);
        if (file_put_contents('../storage/loginInfo.json', $final_data)){
            return true;
        }else{
            return false;
        }
    }
}