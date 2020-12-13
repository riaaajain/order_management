<?php

include "include/header.php";

session_start();
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  include "include/conn.php";
  
  $query = "SELECT * FROM customer WHERE email = '$email'";
  $result = mysqli_query($conn, $query);
  $customer = mysqli_fetch_assoc($result);
  $userid = $customer['ID'];
  // var_dump($customer);
  $query2 = "SELECT * from cart where user_id = $userid && status =0";
  $result2 = mysqli_query($conn, $query2);
  while ($row = $result2->fetch_assoc()) {
    $vals[]=$row;
    }
    foreach($vals as $val){
        $queryx = "SELECT * from product where order_id = ".$val['product_id'];
        $resultx = mysqli_query($conn, $queryx);
        while ($row = $resultx->fetch_assoc()) {
            $datas[]=$row;
            }
    }
    $num_rows = mysqli_num_rows($result2);
    var_dump($datas);
}
else{
    header('location: login.php');
}

?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/cart.css" rel="stylesheet">
<div class="container">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-9">
            <div class="ibox">
                <div class="ibox-title">
                    <span class="pull-right">(<strong><?php echo $num_rows; ?></strong>) items</span>
                    <h5>Items in your cart</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table shoping-cart-table">
                            <?php

foreach($datas as $data){
    echo '
    
                        <tbody>
                            <tr>
                            <form method="post" action="">
                            <input type="text" hidden name="prod_name" value="'.$data['prod_name'].'">
                            <input type="text" hidden name="uid" value="'.$userid.'">
                                <td width="90">
                                    <div class="cart-product-imitation">
                                    </div>
                                </td>
                                <td class="desc">
                                    <h3>
                                    <a href="#" class="text-navy">
                                    '.$data['prod_name'].'
                                    </a>
                                    </h3>
                                    <p class="small">
                                        '.$data['prod_desc'].'
                                    </p>

                                    <div class="m-t-sm">
                                        <i class="fa fa-trash"></i>
                                        <input type="submit" class="btn btn-success btn-sm my-2 my-sm-0" name="submit" value="Remove item"/>
                                    </div>
                                </td>
                                <td>
                                    <h4>
                                        INR '.$data['prod_price'].'
                                    </h4>
                                </td>
                                </form>
                            </tr>
                            </tbody>

    ';
}

                            ?>
                        </table>
                    </div>

                </div>

                <div class="ibox-content">
                    <button class="btn btn-primary pull-right" onclick="location.href = 'confirm.php';"><i class="fa fa fa-shopping-cart"></i> Checkout</button>
                    <button class="btn btn-white" onclick="location.href = 'order.php';"><i class="fa fa-arrow-left"></i> Continue shopping</button>

                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Cart Summary</h5>
                </div>
                <div class="ibox-content">
                    <span>
                        Total
                    </span>
                    <h2 class="font-bold">
                        INR 390,00
                    </h2>

                    <hr>
                    <div class="m-t-sm">
                        <div class="btn-group">
                        <a href="confirm.php" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Checkout</a>
                        <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST['submit'])) {
    $uid = $_POST['uid'];
    $prod = $_POST['prod_name'];
    $query = "SELECT `order_id` FROM product WHERE prod_name = '$prod'";
    $result = mysqli_query($conn, $query);
    $ord_id = mysqli_fetch_assoc($result);
    $ord_id = $ord_id['order_id'];
    echo $ord_id;
    $query = "DELETE FROM `cart` WHERE `user_id`=$uid && `product_id`=$ord_id";
    if(mysqli_query($conn, $query)){
        echo "<script>window.location = 'cart.php';</script>";
    }
    else{
      echo "Error";
    }
  }
  ?>