<?php

// onderstaande functie plaatst voor elke record die uit de database komt een product kaart
function showProductCards($result){

    // $resultCheck wordt gebruikt om te kijken of er daadwerkelijk een record is ontvangen
    $resultCheck = mysqli_num_rows($result);

    include_once "Functions/api.php";
    $rate = USDToEUR();

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)){
            productCard($row, $rate);
        }
    } else {
        print ("Er zijn geen resultaten gevonden.");
    }
}

// onderstaande functie plaatst een proct tegel op basis van de aangeleverde array
function productCard($row, $rate) {

    // onderstaande statement kijkt of er een img in de database staat zo niet wordt de dafault image geladen
    if (empty($row['Photo'])) {

        $imgPath = ("img/defaultproduct.jpg");
        $imgBinary = fread(fopen($imgPath, "r"), filesize($imgPath));
        $img = base64_encode($imgBinary);

    } else {
        $img = base64_encode($row["Photo"]);
    }


    // onderstaande print statement plaatst de benodigde html op de pagina
    print('
        <div class="row no-gutters">
            <div class="col-md-4">
                <a href="ProductPage.php?id='. $row["StockItemID"] . '">
                    <img src="data:image/jpeg;base64,'. $img .'" class="card-img" style="object-fit: contain; max-height: 200px;">
                </a>  
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <a href="ProductPage.php?id='. $row["StockItemID"] . '">
                        <h5 class="card-title">'. $row['StockItemName'] . '</h5>
                    </a>
                    <p class="card-text">'.$row['MarketingComments'].'</p>
                    <p class="card-text"> €'.round(($rate * $row['RecommendedRetailPrice']), 2).'</p>
                    <p class="card-text"><small class="text-muted">Vooraad: '. $row['QuantityOnHand'] .' STK</small></p>
                </div>
            </div>
        </div>
    ');
}

?>
