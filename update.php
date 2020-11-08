<?php

if(isset($_POST['submit'])){

    $userPname = $_POST['prod_name'];
    $userPdesc = $_POST['prod_desc'];
    $userPprice = $_POST['prod_price'];
    $userPquantity = $_POST['prod_quantity'];
    $userPpayment = $_POST['payment_mode'];
    $userPid = $_POST['order_id'];

    include "conn.php";
    $query = "UPDATE product set prod_price = $userPprice, prod_name = '$userPname', prod_quantity = '$userPquantity', prod_desc = '$userPdesc', payment_mode = '$userPpayment' where order_id= '$userPid'";
    $result = mysqli_query($conn, $query);
    var_dump($result);


    if($result){
        echo "updated";
        header("location: order.php");
    }
    else{
        $error = mysqli_error($conn);
        echo " error" . $error;
    }
}
else{
    echo "error";
}






?>