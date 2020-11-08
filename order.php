<?php
session_start();
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  include "conn.php";
  
  $query = "SELECT * FROM customer WHERE email = '$email'";
  $result = mysqli_query($conn, $query);
  $customer = mysqli_fetch_assoc($result);
  $userid = $customer['ID'];
  // var_dump($customer);
  $query2 = "SELECT * from product where customer_id = '$userid'";
  $result2 = mysqli_query($conn, $query2);
  // $count = mysqli_num_rows($result2);
  // echo $count;
  
?>
    <!-- <a href="table.php"><button type="button">Place Order</button></a> -->
  



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
      <h1 style="text-align: center; margin-top: 4%;">Your Orders</h1>
      <a href="logout.php"><button type="button" class="btn btn-danger btn-sm" style="float: right;">Log out</button></a>
      <?php
        if (mysqli_num_rows($result2) == 0) {
          echo "your cart is empty";
      ?>
      <a href="table.php"><button type="button" class="btn btn-primary">Place Order</button></a>
      <?php
        } 
        else {

      ?>
      
      <hr>
      <div class="container">
        <div class="row">
          <div class="col col-12">
            <table class="table table-dark">
              <thead>
                <tr>
                  <th>Customer ID </th>
                  <th> Prdocut Name </th>
                  <th>Product Description </th>
                  <th>Product Price </th>
                  <th>Product Quantity</th>
                  <th> Order Status </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result2)) {
                ?>
                  <tr>
                    <td><?php echo $row["customer_id"]; ?></td>
                    <td><?php echo $row["prod_name"]; ?></td>
                    <td><?php echo $row["prod_desc"]; ?></td>
                    <td><?php echo $row["prod_price"]; ?></td>
                    <td><?php echo $row["prod_quantity"]; ?></td>
                    <td><?php echo $row["order_status"]; ?></td>

                    <td>
                      <a href="table.php?order_id=<?php echo $row["order_id"] ?>"><button type="button" class="btn btn-success btn-sm">Update</button></a>
                      <a href="delete.php?order_id=<?php echo $row["order_id"] ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                    </td>

                  </tr>

                <?php
                }
                ?>
              </tbody>
            </table>
            <a href="table.php"><button type="button" class="btn btn-secondary btn-lg mt-4" style="margin-left: 82%;" >Place more order</button></a>
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
<?php
  }
} else {
  header('location: login.php');
}

?>