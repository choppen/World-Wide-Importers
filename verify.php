<?php
include "Includes/Header.php";
?>

<?php
include_once 'Functions/dbconnections.php';
if(isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];
    $connection = dbConnectionRoot();
    $sql = "SELECT verified, vkey FROM customers WHERE verified = 0 AND vkey='$vkey';";
    $result = $connection->query($sql);
    if(mysqli_num_rows($result) ==1)  {
        $sqlupdate = "UPDATE customers SET verified = 1 WHERE vkey = '$vkey' LIMIT 1;";
        $update = $connection->query($sqlupdate);
        
        if($update) {
            print("Uw account is geverifieerd, u kunt nu inloggen");
        }
    } else {
        print("Dit account bestaat niet of is al geverifieerd");
    }
} else {
    header('Location: index.php?error=incorrectorder');
}
?>

<?php
include "Includes/Footer.php";
?>