<?php
global $connect;
$servername = "localhost";
$username = "root";
$password = "";
$db = "brdo";

try {
    $connect = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    }
?>