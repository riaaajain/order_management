<?php

$servername = 'localhost';
$userId = 'root';
$userPassword = 'riaaa_jain';
$databases = 'orders';

$conn = mysqli_connect($servername, $userId, $userPassword, $databases);


if(!$conn){
    die( "not Connected");
}

?>