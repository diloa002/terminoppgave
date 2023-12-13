<?php

//Om POST er brukt hentes dataen fra formen og blir til variablene
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $surname = $_POST["surname"];
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    
    try {
        //Kobler til databasen
        require_once "dbh.inc.php";

        //Setter  inn i databasen
        $query = "INSERT INTO users (firstname, surname, username, pwd, email) VALUES (:firstname, :surname, :username, :pwd, :email);";

        $stmt = $pdo->prepare($query);

        //hasher passord
        $options = [
            'cost'=> 12
        ];
        $hasedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

       //Binder sammen variablene og dataen som skal settes inn i tabellen, så dataen i variablen er det som settes inn
       $stmt->bindParam(":firstname", $firstname);
       $stmt->bindParam(":surname", $surname);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
        $stmt->bindParam(":pwd", $hasedPwd);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $pdo = null;
        $stmt = null;
        header("Location: ../index.php"); 
        die();
    
    } catch (PDOException $e) {
       die("Query failed: " . $e->getMessage());
    }

  
} else {
    header("Location: ../index.php"); 
}