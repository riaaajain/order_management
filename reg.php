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
      <h1 style="text-align: center; margin-top: 4%;">Registration Page</h1>
      <div class="container">
        <div class="row">
          <div class="col-9">
          <form style="margin-left:35%; margin-top:8%" action="submit.php" method="POST">
            <div class="form-group">
              <label for="name"><b>Name</b></label>
              <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1"><b>Email address</b></label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
              <label for="phno"><b>Phone Number</b></label>
              <input type="number" class="form-control" id="phno" placeholder="Enter Number" name="phone" required>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1"><b>Password</b></label>
              <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
            </div>
            
            <input type="submit" class="btn btn-success" name="submit" value="Register"><br><br>
            <a href="login.php" style="color: red;"> <b> Already a user? Login </b></a>
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