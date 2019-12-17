<?php
if(isset($_POST['loginbutton'])) {
    include_once "Functions/dbconnections.php";
    $connection = dbConnectionRoot();
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($email) OR empty($password)) {
        header("Location: login.php?error=emptyfields");
        exit();
    } else {
        //The ? are placeholders. If he dont use ?, the loginsystem is not secure and hackers can imput sql querys that can ruin the database
        //We make prepared statements we are gonna use in the ? places
        $sql = "SELECT * 
                FROM Customers 
                WHERE EmailAddress=?;";
        $satement = mysqli_prepare($connection, $sql);
            //We use the same variable because the query searches for two different things. It searches for the email
            mysqli_stmt_bind_param($satement, "s", $email);
            mysqli_stmt_execute($satement);
            $result = mysqli_stmt_get_result($satement);
            if($row = mysqli_fetch_assoc($result)) {
                //Here we check if the password given by the user is the same as the one in the database. This will give a bolean
                $passwordCheck = password_verify($password, $row['HashedPassword']);
                if($passwordCheck == FALSE) {
                    header("Location: login.php?error=wrongpassword");
                    exit();
                } elseif($passwordCheck == TRUE) {
                //This checks if the account is verified
                        session_start();
                        $_SESSION['CustomerID'] = $row['CustomerID'];
                        header("Location: index.php?login=succes");
                        exit();
                    }
                 } elseif ($passwordCheck == FALSE) {
                        header("Location: login.php?error=wrongpassword");
                        exit();
                 } else {
                header("Location: login.php?error=nouser");
                exit();
            }
        }
    
} else {
    header("Location: login.php");
    exit();
}