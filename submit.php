<?php

include "include/conn.php";

if(isset($_POST['submit'])){
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPhno = $_POST['phone'];
    $password = $_POST['password'];
    // var_dump($_POST);
   
    if($conn){
        $query = "INSERT into customer (name, email, phno, password) values ('$userName', '$userEmail', '$userPhno', '$password')";
        $result = mysqli_query($conn, $query);
        $error = mysqli_error($conn);
        if(!$result){
            echo "error" .$error;
        }
        else{
            // echo 'query added successfully';
            header('location: login.php');
        }
    }
    else{
        echo "not connected";
    }



}

?>