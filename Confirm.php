<html>

<head>
    <title>WideWorldImporters</title>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Functie Includes -->
        <?php include_once 'Functions/DBConnections.php'; ?>
</head>

<body>
  <?php

    $CustomerID = 1056;
    $query =("SELECT EmailAddress
      FROM customers
      WHERE CustomerID = $CustomerID;");

    $connection = dbConnectionRoot();
    $result= mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    $email = ("cgj.hoppen@gmail.com");
    //$email = $row['EmailAddress'];
    $subject = ("Order conformatie $OrderID");
    $message = ("Geachte heer/mevrouw\n\n
      Bedankt voor uw bestelling.\n 
      wij zullen deze in behandeling nemen.\n\n
      Met vriendelijke groet,\n
      Wide World Importers
    ");

    mail($email, $subject, $message);

    //header("Location: shoppingcart.php");

    // if (mail($email, $subject, $message) == true) {
    //   header("Location: shoppingcart.php");
    // }

  ?>


</body>
</html>