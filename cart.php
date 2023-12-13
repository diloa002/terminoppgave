<?php
require_once "includes/dbh.inc.php";
require "includes/nav.inc.php";
'<html><link rel="stylesheet" href="terminoppgave.css"></html>';


// Viser handlekurven
$sql = "SELECT idcart, products.idproducts, products.productname, products.producttype, products.color, products.prize
        FROM cart
        JOIN products ON cart.products_idproducts = products.idproducts
        WHERE 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalPrice = 0;

// Skriv ut handlekurven
if ($cartItems) {
    echo "<h2>Cart</h2>";
    foreach ($cartItems as $row) {
        echo "<p>Navn: {$row['productname']}</p>";
        echo "<p>Type: {$row['producttype']}</p>";
        echo "<p>Farge: {$row['color']}</p>";
        echo "<p>Pris: {$row['prize']}</p>";
        
        $totalPrice += $row['prize'];

        echo "<form method='POST' action='includes/delete_from_cart.php'>
        <input type='hidden' name='idproducts' value='{$row['idcart']}'>
        <input id='submit' type='submit' value='Fjern fra handlekurv'>
        </form>";
        echo "<hr>";
    }
    echo "<p>Totalpris: $totalPrice</p>";
} else {
    echo "<p>Handlekurven er tom.</p>";
}

$pdo = null;
?>
