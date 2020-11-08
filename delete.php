<?php

include "conn.php";
if(!$conn){
    echo "some error occured";
}
if( isset($_GET['order_id']) ){
    $ID = $_GET['order_id'];
    $query = "DELETE FROM product WHERE order_id='$ID' ";
    $result = mysqli_query($conn,$query);
    if($result){
        echo "deleted record";
        header("location: order.php");
    }
}

?>