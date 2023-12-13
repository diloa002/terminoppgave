<?php

// Sjekker om brukernavnet er valid
if(empty(trim($_POST["username"]))){
    echo "Please enter a username.";
    echo "<a href='../loginside.php'>Prøv igjen</a>";
} elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
    echo "Username can only contain letters, numbers, and underscores."; 
} elseif (isset($_POST['login'])){
    //Gjør om fra data til variabler
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    //kobler til db
    $dbc = require_once "dbh.inc.php";

    $query = "SELECT * FROM users WHERE username = :username and pwd = :pwd";

    $stmt = $pdo->prepare($query)
    or die('Error querying database');

    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->bindParam(":pwd", $pwd, PDO::PARAM_STR);


    $stmt->execute();

    $pdo = null;
    $stmt = null;


   header('location: ../index.php');
   
    die();
}
?>
