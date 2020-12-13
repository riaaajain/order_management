<?php
session_start();
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  include "include/conn.php";
  
  $query = "SELECT * FROM customer WHERE email = '$email'";
  $result = mysqli_query($conn, $query);
  $customer = mysqli_fetch_assoc($result);
  $userid = $customer['ID'];
  // var_dump($customer);
  $query2 = "SELECT * from product where prod_quantity > 0";
  $result2 = mysqli_query($conn, $query2);
  while ($row = $result2->fetch_assoc()) {
    $datas[]=$row;
    }
    // var_dump($datas);
?>
    <!doctype html>
    <html lang="en">

    <head>
      <title>Title</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="css/order.css" rel="stylesheet">
      </head>

    <body>
    <?php include "include/header.php"; ?>

    <!DOCTYPE html>
<html lang="en">
<head>
<div class="container">
  <div class="row">
    <?php
    
    foreach($datas as $data){

      echo '
      <div class="col-sm-6 col-md-4">
      <div class="shop__thumb">
      <!-- <a href="#"> -->
      <form method="post" action="">
      <input type="text" hidden name="prod_name" value="'.$data['prod_name'].'">
      <input type="text" hidden name="uid" value="'.$userid.'">
          <div class="shop-thumb__img">
            <img src="https://via.placeholder.com/400x400/87CEFA/000000" class="img-responsive" alt="...">
          </div>
          <h5 class="shop-thumb__title">
            '.$data['prod_name'].'
          </h5>
          <div>
          '.$data['prod_desc'].'
          </div>
          <div class="shop-thumb__price">
            <span class="shop-thumb-price_new">INR '.$data['prod_price'].'/-</span>
          </div><br>
          <!-- </a> -->
          <input type="submit" class="btn btn-success btn-sm my-2 my-sm-0" name="submit" value="Add to Cart"/>
          </form>
      </div>
    </div>
      ';
    }
    ?>
      </div> 
    </div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>
<?php
} else {
  header('location: login.php');
}
if(isset($_POST['submit'])) {
  $uid = $_POST['uid'];
  $prod = $_POST['prod_name'];
  $query = "SELECT `order_id` FROM product WHERE prod_name = '$prod'";
  $result = mysqli_query($conn, $query);
  $ord_id = mysqli_fetch_assoc($result);
  $ord_id = $ord_id['order_id'];
  echo $ord_id;
  $query = "INSERT INTO `cart`(`user_id`, `product_id`) VALUES ('$uid','$ord_id')";
  if(mysqli_query($conn, $query)){
    echo "<script>window.location = 'order.php';</script>";
  }
  else{
    echo "Error";
  }
}
?>