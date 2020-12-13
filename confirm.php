<?php

session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    include "include/conn.php";
    
    $query = "SELECT * FROM customer WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $customer = mysqli_fetch_assoc($result);
    $userid = $customer['ID'];
    $query = "UPDATE `cart` SET `status`=1 WHERE `user_id`=$userid";
    if(mysqli_query($conn, $query)){
        echo "<script>window.location = 'order.php';</script>";
    }
    else{
      echo "Error";
    }
}

?>