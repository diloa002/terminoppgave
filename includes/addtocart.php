<?php
require_once "dbh.inc.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idproducts'])) {
        $productId = $_POST['idproducts'];
 

        $sql = "INSERT INTO `cart` (products_idproducts) VALUES (:idproducts)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idproducts', $productId);
        $stmt->execute();
        header("location: ../products.php");
        echo "<script>alert('Produktet er lagt til i handlekurven.');</script>";
    } else {
        echo "Feil: Produkt-ID mangler.";
    }
} else {
    echo "Feil forespørselsmetode.";
}

$pdo = null;
?>
