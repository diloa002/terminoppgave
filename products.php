<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

require_once "includes/dbh.inc.php";
require "includes/nav.inc.php";

$sql = "SELECT * FROM products";
$result = $pdo->prepare($sql);
$result->execute();

$rows = $result->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
    $name = $row['productname'];
    $type = $row['producttype'];
    $color = $row['color'];
    $prize = $row['prize'];
    $img = $row['picture'];

    echo "<div class ='products'>";
    echo "<img class='product_img' src='pictures/$img' alt='Bilde av produkt'>";
    echo "<div class = 'product_info'>";
    echo "<p id='product_name'>Name: $name</p>";
    echo "<p>Type: $type</p>";
    echo "<p>Color: $color</p>";
    echo "<p>Prize: $prize</p>";
    echo "</div>";
    echo "<form method='POST' action='includes/addtocart.php'>
        <input type='hidden' name='idproducts' value='{$row['idproducts']}'>
        <input id='submit' type='submit' value='Add to cart'>
        </form>";
    echo "</div>";
}

$pdo = null;

?>

    
</body>
</html>

