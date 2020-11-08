<?php
session_start();
include "conn.php";

if(isset($_POST['submit']) && $_SESSION['email']){
  $email = $_SESSION['email'];
  $userPname = $_POST['prod_name'];
  $userPdesc = $_POST['prod_desc'];
  $userPprice = $_POST['prod_price'];
  $userPquantity = $_POST['prod_quantity'];
  $userPpayment = $_POST['payment_mode'];

  // var_dump($_POST);

  if($conn){
    $query2 = "SELECT * FROM customer WHERE email = '$email'";
    $result2 = mysqli_query($conn,$query2);
    
    $customer = mysqli_fetch_assoc($result2);
    $customerid = $customer['ID'];

    $query = "INSERT into product (customer_id,prod_name, prod_desc, prod_price, prod_quantity, payment_mode) values ('$customerid', '$userPname', '$userPdesc', '$userPprice', '$userPquantity','$userPpayment')";
    $result = mysqli_query($conn, $query);
    $error = mysqli_error($conn);
    if(!$result){
        echo "error" .$error;
    }
    else{
        // echo 'query added successfully';
        header('location: order.php');
    }
}
else{
    echo "not connected";
}
}
if(isset($_GET['order_id']) && $_GET['order_id'] != ""){
  // var_dump($_GET);
  $ID = $_GET['order_id'];
  $q3 = "SELECT * FROM product where order_id = '$ID'";
  $r3 = mysqli_query($conn, $q3);
  if(mysqli_num_rows($r3) == 1){
    $product = mysqli_fetch_assoc($r3);
  }
  else{
    echo "customer not found";
  }
}




?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <h1 style="text-align: center; margin-top: 4%;">Place Order</h1>
  <hr>
  <div class="container">
    <div class="row">
      <div class="col-9">
        <form action="<?php if(isset($product)){ echo "update.php";} else {echo "table.php";} ?>" method="POST" style="margin-left:35%; margin-top:8%">
          <input type="text" name="order_id" value="<?php if(isset($product)){ echo $product['order_id'];} ?>" style="display: none;">
          <div class="form-group">
            <label for="name"><b>Product Name: </b></label>
            <input type="text" class="form-control" id="prod_name" placeholder="Enter Product Name" name="prod_name" value = "<?php if(isset($product)){ echo $product['prod_name'];} ?>">
          </div>

          <div class="form-group">
            <label for="desc"><b>Product Description: </b></label>
            <input type="text" class="form-control" id="prod_desc" placeholder="Enter Product Description" name="prod_desc" value = "<?php if(isset($product)){ echo $product['prod_desc'];} ?>">
          </div>

          <div class="form-group">
            <label for="price"><b>Product Price: </b></label>
            <input type="number" class="form-control" id="prod_price" placeholder="Enter Product Price" name="prod_price" value = "<?php if(isset($product)){ echo $product['prod_price'];} ?>">
          </div>

          <div class="form-group">
            <label for="quantity"><b>Product Quantity: </b></label>
            <input type="number" class="form-control" id="prod_quantity" placeholder="Enter Product Quantity" name="prod_quantity" value = "<?php if(isset($product)){ echo $product['prod_quantity'];} ?>">
          </div>
          <div class="from=group">
          <label for="payment"><b>Payment Mode: </b></label>
          <select name="payment_mode" id="payment_mode" value = "<?php if(isset($product)){ echo $product['payment_mode'];} ?>">
            <option value="UPI">UPI</option>
            <option value="debit">Debit Card</option>
            <option value="credit">Credit card</option>
          </select>
          </div>
          <input type="submit" class="btn btn-primary" name="submit" value="Place order">
         
        </form>
      </div>
    </div>
  </div>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>