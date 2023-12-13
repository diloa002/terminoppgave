<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
   // $email = $_POST["email"];

   
    
    try {
        require_once "dbh.inc.php";

        $query = "DELETE FROM users WHERE username = :username AND pwd = :pwd;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
        //$stmt->bindParam(":email", $email);

        $stmt->execute();

        $pdo = null;
        $stmt = null;
        header("Location: ../index.php"); 
        echo "Din bruker er nå slettet.";
        die();
    
    } catch (PDOException $e) {
       die("Query faild: " . $e->getMessage());
    }

  
} else {
    header("Location: ../index.php"); 
}