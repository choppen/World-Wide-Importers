<?php
    function mollieInit(){

        //namespace _PhpScoper5de0f335c4b90;
    
        /*
        * Make sure to disable the display of errors in production code!
        */
        \ini_set('display_errors', 1);
        \ini_set('display_startup_errors', 1);
        \error_reporting(\E_ALL);
        require_once __DIR__ . "/../mollie/vendor/autoload.php";
        /*
        * Initialize the Mollie API library with your API key.
        *
        * See: https://www.mollie.com/dashboard/developers/api-keys
        */
    
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_QP4S6PV75uhQUfAt7m8QMDCKgCaMyD");
    
        return $mollie;

    }

    function createPayment($price) {

        $payment = mollieInit()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "$price"
            ],
            "description" => "Order #12345",
            "redirectUrl" => "http://localhost/World-Wide-Importers/index.php",
        ]);

        return $payment->getCheckoutUrl();

    }

?>
