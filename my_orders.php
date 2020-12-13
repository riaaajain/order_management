<?php

session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    include "include/conn.php";
    
    $query = "SELECT * FROM customer WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $customer = mysqli_fetch_assoc($result);
    $userid = $customer['ID'];
    $query = "SELECT * FROM cart WHERE user_id = '$userid' && status=1";
    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        $itms[]=$row;
        }
    // var_dump($itms);
}
else{
    header('location: login.php');
}
include "include/header.php";

foreach($itms as $itm){
    echo '
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="bg-white p-2 border rounded px-3">
                <div class="d-flex flex-row justify-content-between align-items-center order">
                    <div class="d-flex flex-column order-details"><span>Order ID # '.$itm['id'].'</span></div>
                    <div class="tracking-details"></div>
                </div>
                <hr class="divider mb-4">
                <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                ';
                $query = "SELECT * FROM product WHERE order_id = '".$itm['product_id']."'";
                $result = mysqli_query($conn, $query);
                $product = mysqli_fetch_assoc($result);
                $userid = $customer['ID'];
                echo "Order Staus : ".$itm['stat'];
                echo "<br>Product Name : ".$product['prod_name'];
                echo "<br>Price : ".$product['prod_price'];
                echo '
                </div>
            </div>
        </div>
    </div>
</div>
    ';
}
?>
<link href="css/my_orders.css" rel="stylesheet">

