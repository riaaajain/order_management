<?php

session_start();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $stat = $_POST['status'];
    // var_dump($_POST);
    include "include/conn.php";
    $query = "UPDATE `cart` SET `stat`='$stat' WHERE `id`=$id";
    echo $query;
    if(mysqli_query($conn, $query)){
        echo "<script>window.location = 'admin.php';</script>";
    }
    else{
        echo mysqli_error($conn);
    }
}

?>