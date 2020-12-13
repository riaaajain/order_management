<?php

$servername = 'localhost';
$userId = 'root';
$userPassword = '';
$databases = 'test';

$conn = mysqli_connect($servername, $userId, $userPassword, $databases);


if(!$conn){
    die( "not Connected");
}
