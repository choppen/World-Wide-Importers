<?php
include "Includes/Header.php";
?>

<html>
<head> 
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h2 class="card-title text-center">Aanmelden</h2>
            <form class="form-signin" action="signupfunctions.php" method="post">
              <div class="form-label-group">
                <label for="name">Naam</label>
                <input type="name" name="FullName" class="form-control" placeholder="Naam" required autofocus>
              </div>
              <br>
              <div class="form-label-group">
                <label for="email">E-mailadres</label>
                <input type="email" name="EmailAddress" class="form-control" placeholder="E-mailadres" required>
              </div>
              <br>
              <div class="form-label-group">
                <label for="password">Wachtwoord</label>
                <input type="password" name="Password" class="form-control" placeholder="Wachtwoord" required>
              </div>
              <br>
              <div class="form-label-group">
                <label for="password">Herhaal uw wachtwoord</label>
                <input type="password" name="PasswordRepeat" class="form-control" placeholder="Herhaal wachtwoord" required>
              </div>
              <br>
              <div class="form-label-group">
                <label for="phonenumber">Telefoonnummer</label>
                <input type="phonenumber" name="PhoneNumber" class="form-control" placeholder="Telefoonnummer" required>
              </div>
              <br>
              <div class="form-label-group">
                <label for="adres">Adres</label>
                <input type="adres" name="DeliveryAddress" class="form-control" placeholder="Adres" required>
              </div>
              <br>
              <div class="form-label-group">
                <label for="postalcode">Postcode</label>
                <input type="postalcode" name="PostalCode" class="form-control" placeholder="Postcode" required>
              </div>
              <br>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="signupbutton">Registreer</button>
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