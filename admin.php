<?php
include( "include/conn.php" );
$flag = 0;
session_start();
if (isset($_SESSION['email'])){

    $flag = 1;
    $email = $_SESSION['email'];
    $query = "SELECT * FROM cart WHERE 1";
    $result= mysqli_query($conn, $query) or die(mysqli_error($conn));
    while ($row = $result->fetch_assoc()) {
        $datas[]=$row;
        }
        // var_dump($datas);

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand" href="#">
    <img src="https://img.icons8.com/color/55/000000/shopify.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Shopify
  </a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
          </div>

          <h2>Order Requests</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>customer Name</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Status</th>
                  <th>Confirm</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $x = 1;
              foreach($datas as $data):
                // var_dump($data);
                $query = "SELECT * FROM product WHERE order_id = '".$data['product_id']."'";
                $result = mysqli_query($conn, $query);
                $product = mysqli_fetch_assoc($result);
                $query = "SELECT * FROM customer WHERE ID = '".$data['user_id']."'";
                $result = mysqli_query($conn, $query);
                $customer = mysqli_fetch_assoc($result);
                    ?>
                    <form method="post" action="set_stat.php">
                    <input type="number" hidden name="id" value="<?php echo $data['id']; ?>">
						<tr>
							<td><?php echo $data['id']; ?></td>
                            <td><?php echo  $customer['name']; ?></td>
                            <td><?php echo  $product['prod_name']; ?></td>
							<td><?php echo  $data['qty']; ?></td>
                            <td>
                                <select id="status" name="status">
                                    <option value="<?php echo  $data['stat']; ?>"><?php echo  $data['stat']; ?></option>
                                    <option value="Placed">Placed</option>
                                    <option value="Dispatched">Dispatched</option>
                                    <option value="Delivered">Delivered</option>
                                </select>
                            </td>
              <td><input type="submit" class="btn btn-success btn-sm my-2 my-sm-0" name="submit" value="Change"/></td>
                        </tr>
              </form>
					<?php endforeach;?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>
