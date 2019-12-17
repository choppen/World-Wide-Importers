<?php
include "Includes/Header.php";
?>

<!DOCTYPE html>
<html>
    <head> 
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
<body>
<!-- login form -->

<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h2 class="card-title text-center">Login</h2>
            <form class="form-signin" action="loginfunctions.php" method="post">
              <div class="form-label-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
              </div>
              <br>
              <div class="form-label-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>
              <br>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="loginbutton">Log in</button>
              <hr class="my-4">
              <div class="form-laber-group">
                <label for="vraag">Nog geen account?</label>
                <a href="signup.php">Registreer dan hier</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php
include "Includes/Footer.php";
?>