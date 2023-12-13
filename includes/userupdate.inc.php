<?php

try {

    // Lager variabler fra formen i changeuser.php hvis POST ble brukt
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $oldUsername = $_POST["oldusername"];
        $oldPwd = $_POST["oldpwd"];
        $newUsername = $_POST["newusername"];
        $newPwd = $_POST["newpwd"];

    //Kobler til db    
    require_once "dbh.inc.php";


        // Validerer gamle data
        $sql = "SELECT * FROM users WHERE username = :oldUsername AND pwd = :oldPwd";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':oldUsername', $oldUsername);
        $stmt->bindParam(':oldPwd', $oldPwd);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Oppdaterer hvis det gamle er riktig
            $updateSql = "UPDATE users SET username = :newUsername, pwd = :newPwd WHERE username = :oldUsername";
            $updateStmt = $pdo->prepare($updateSql);
            $updateStmt->bindParam(':newUsername', $newUsername);
            $updateStmt->bindParam(':newPwd', $newPwd);
            $updateStmt->bindParam(':oldUsername', $oldUsername);

            if ($updateStmt->execute()) {
                echo "Record updated successfully";
                header("Location: ../minside.php");
            } else {
                echo "Error updating record";
            }
        } else {
            echo "Incorrect old username or password. <a href='changeuser.php'>Prøv igjen</a> ";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Lukker PDO tilkoblingen
$pdo = null;
?>