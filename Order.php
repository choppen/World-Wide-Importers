
<?php include "Includes/Header.php" ?>
<?php include_once "Functions/dbconnections.php" ?>
<?php include "Functions/mollie.php" ?>

<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Winkelwagentje</h5>

                    <?php
                        foreach ($_SESSION['cart'] as $product => $numberOf){
                            $query = (" SELECT *
                                FROM stockitems
                                WHERE StockItemID = $product
                            ");

                            $result = mysqli_query(dbConnectionRoot(), $query);
                            $row = mysqli_fetch_assoc($result);

                            print ('
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-10">
                                            '.$row['StockItemName'].'
                                        </div>
                                        <div class"col-2">
                                            <span class="badge badge-primary badge-pill">'.$numberOf.'</span>
                                        </div>
                                    </div>
                                </li>');
                        }
                    ?>
                    <br>
                    <a href="shoppingcart.php" class="card-link">Aanpassen</a>

                </div>
            </div>      
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Bezorgadres </h5>
                    <p class="card-text">
                        <?php
                            $CustomerID = 1056;
                            $query = ("SELECT CustomerName, EmailAddress, PhoneNumber, DeliveryAddressLine1, DeliveryPostalCode
                            FROM customers
                            WHERE CustomerID = $CustomerID;
                            ");
                    
                            $result= mysqli_query(dbConnectionRoot(), $query);
                            $row = mysqli_fetch_assoc($result);

                            print ("Dhr / Mevr. ".$row['CustomerName']."<br>");
                            print ($row['DeliveryAddressLine1']."<br>");
                            print ($row['DeliveryPostalCode']."<br>");
                        ?>
                    </p>

                </div>
            </div>
            <div class="row" style="margin-top: 50px;">
                <div class="container">
                    <a class="btn btn-primary btn-block" href="<?php print(createPayment($_GET['mollie'])) ?>"> Naar betalen! </a>
                </div>
            </div>
        </div>
    </div>
</div>

<ul class="list-group list-group-flush">
