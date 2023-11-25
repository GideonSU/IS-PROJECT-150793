<?php

$username = $_POST["username"];
$password = $_POST["password"];
$usertype = $_POST["usertype"];


$conn = new mysqli('localhost', 'root', '', 'flea_market_db');
if($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into user_login
                            (username, password, usertype)
                                values(?,?,?)");
    $stmt->bind_param("ssi",$username, $password, $usertype);
    $stmt->execute();
    echo "Sign Up Successful!";
    $stmt->close();
    $conn->close();
}


