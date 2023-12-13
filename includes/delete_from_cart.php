<?php
require_once "dbh.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idproducts'])) {
        $productId = $_POST['idproducts'];

        // Slett produktet fra handlekurven (tilpass dette etter din databasestruktur).
        $sql = "DELETE FROM `cart` WHERE idcart = :idproducts";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idproducts', $productId);
        $stmt->execute();

        // Vis JavaScript alert
        echo "<script>alert('Produktet er fjernet fra handlekurven.');</script>";

        // Omdiriger tilbake til visningsiden for handlekurven (du kan tilpasse URL-en).
        header("Location: ../cart.php");
        exit();
    } else {
        echo "Feil: Produkt-ID mangler.";
    }
} else {
    echo "Feil forespørselsmetode.";
}

$pdo = null;
?>
