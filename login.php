<?php

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    include "include/conn.php";

    $query = "SELECT * FROM customer WHERE email = '$email'";
    $result = mysqli_query($conn,$query);
    
    $customer = mysqli_fetch_assoc($result);
    
    if($customer['password']==$password){
        echo 'login sucessfull';
        session_start();
        $_SESSION['email'] = $email;
        if($email == "admin@admin.com"){
          header('Location: admin.php');
        }
        else{
          header('Location: order.php');
        }
    }
    // else{
    //   echo "Your password is incorrect";
    // }
    
     
    

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
  <h1 style="text-align: center; margin-top: 4%;">Login Page</h1>
  <div class="container">
      <div class="row">
        <div class="col-9">
        <form style="margin-left:35%; margin-top:8%" action="login.php" method="POST"> 
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value = "<?php if(isset($customer)){ echo $customer['email'];} ?>" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                
                <label for="exampleInputPassword1">Password</label>
                <span style="color: red;" ><?php if( isset($_POST['submit']) && $password != $customer['password'] ) { echo "enter correct password"; } ?></span>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                
            </div>
            
            <input type="submit" name="submit" value="Log In" class="btn btn-success"><br><br>
            <a href="reg.php" style="color: red;" ><b> New user? Register </b></a>
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