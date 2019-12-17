<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- bootstrap js bundle -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Font awesome icons -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <?php include_once 'Functions/dbConnections.php'; ?>

    <title>WorldWideImporters</title>

</head>
<body>

<div class="row bg-dark">
    <div class="container">
        <div class="row">
            <!-- logo -->
            <div class="col-2 align-self-center">
                <a href="index.php">
                    <img src="img/wwiLogo.png" style="max-width: 100%;">
                </a>
            </div>

            <!-- search -->
            <div class="col-8 align-self-center">

                <form method="GET" action="Results.php"> <!-- die margins zijn niet idiaal maar kan niks beters vinden -->
                    <div class="input-group">
                        
                        <input name="search" type="text" class="form-control">
                        <input type="hidden"  value="" name="cat"> </input>
                        <input type="hidden" value="25" name="select"> </input>

                        <div class="input-group-append">
                            <button name="submit" type="submit" class="btn btn-primary">Zoek!</button>
                        </div>
                    </div>
                </form>

            </div>

            <!-- login button -->
            <div class="col-2 align-self-center text-center">
                <?php
                if(!isset($_SESSION['CustomerID'])) {
                    print('<a href="login.php" style="color: white; margin: 0 auto;"> Inloggen <a>');
                } else {
                    print('<form method=post action=logout.php>
                    <button type="submit" name="logout">Uitloggen</button>
                    </form>');
                }
                ?>
                <!-- <a href="login.php" style="color: white; margin: 0 auto;"> Inloggen <a> -->
                <a href="shoppingcart.php"><i class="fa fa-shopping-cart fa-lg"></i></a>
            </div>

        </div>
    </div>
</div>

<div class="row bg-secondary">
    <div class="container">
        <div class="row" style="padding: 5px;">
            <div class="col-2">

                <div class="dropdown">
                    <a class="btn btn-outline-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                        Catagorien
                    </a>
                    <div class="dropdown-menu">
                        <?php
                            $query = ("SELECT StockGroupID, StockGroupName FROM stockgroups");
                            $result = mysqli_query(dbConnectionRoot(), $query);
                            $resultCheck = mysqli_num_rows($result);
                            if ($resultCheck > 0) {
                                while ($row = mysqli_fetch_assoc($result)){
                                    print('
                                        <a class="dropdown-item" href="Results.php?cat=' . $row["StockGroupID"] . '&search=&select=25">' . $row["StockGroupName"] . '</a>
                                    ');
                                }
                            }
                        ?>
                    </div>
                </div>

            </div>
            <div class="col-8">

            </div>
            <div class="col-2">

                <?php
                if (isset($_GET['select'])){
                    print ('
                        <div class="dropdown">
                            <a class="btn btn-outline-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                                Paginatie: '. $_GET["select"] .'
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="Results.php?cat='. $_GET["cat"] .'&search='. $_GET['search'] .'&select=25" > 25 </a>
                                <a class="dropdown-item" href="Results.php?cat='. $_GET["cat"] .'&search='. $_GET['search'] .'&select=50" > 50 </a>
                                <a class="dropdown-item" href="Results.php?cat='. $_GET["cat"] .'&search='. $_GET['search'] .'&select=100" > 100 </a>
                            </div>
                        </div>
                    
                    ');
                }
                ?>

            </div>
        </div>
    </div>
</div>

</body>
</html>