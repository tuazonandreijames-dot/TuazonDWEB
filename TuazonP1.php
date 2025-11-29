<?php
$storeName = "Cartridge Cove";
$tagline = "Classic games para sa classic heartbreak";
$owner = "Andrei James G. Tuazon";
$section = "WD-201";
$currency = "₱";

require "items.php";

$totalPrice = 0;
$totalStock = 0;
$outOfStock = 0;

foreach ($items as $item) {
    $totalPrice += $item["price"];
    $totalStock += $item["stock"];
    
    if ($item["stock"] == 0) {
        $outOfStock++;
    }
}

switch (count($items)) {
    case 1:
        $storeCategory = "Single Cartridge Find";
        break;
    case 2:
    case 3:
        $storeCategory = "8-bit Starter Collection";
        break;
    case 4:
    case 5:
        $storeCategory = "16-bit Era Inventory";
        break;
    default:
        $storeCategory = "Full Retro Workshop";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $storeName ?></title>

    <style>
        body {
            font-family: 'Press Start 2P', cursive, monospace;
            background: linear-gradient(135deg, #4b0082 0%, #00008b 50%, #800080 100%);
            color: #ccff00;
            background-size: cover;
            background-repeat: no-repeat;
            padding: 20px;
        }
        h1 {
            color: #ff00ff;
            text-shadow: 2px 2px 0 #000;
            padding-bottom: 5px;
            margin-bottom: 5px;
            border-bottom: 4px solid #ccff00;
        }
        h2 {
            font-style: normal;
            color: #00ffff;
            margin-top: 0;
            margin-bottom: 20px;
        }
        h1, h2, h3, p {
            text-align: center;
        }
        table {
            width: 85%;
            margin: auto;
            border-collapse: collapse;
            background: rgba(0, 0, 0, 0.7);
            box-shadow: 0 0 10px #ff00ff;
        }
        th, td {
            border: 1px solid #00ffff;
            padding: 12px;
            text-align: center;
        }
        th {
            background: #4b0082;
            color: #ccff00;
            text-transform: uppercase;
        }
        .out-of-stock { color: #ff0000; font-weight: bold; }
        .low-stock { color: #ffcc00; font-weight: bold; }
        .available { color: #00ff00; }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>

<body>

<h1><?= $storeName ?></h1>
<h2><?= $tagline ?></h2>
<h3>Owned by: <?= $owner ?> | Section: <?= $section ?></h3>

<p>
    <?= "Total Product Types: " . count($items) ?> <br>
    <?= "Combined Inventory: $totalStock items" ?> <br>
    <?= "Total Catalog Value: $currency" . number_format($totalPrice, 2) ?> <br>
    <?= "Relics Out of Stock: $outOfStock" ?> <br>
</p>
<h3>
    <?= "Inventory Tier: $storeCategory" ?>
</h3>

<table>
    <tr>
        <th>Product</th>
        <th>Price (<?= $currency ?>)</th>
        <th>Type</th>
        <th>Stock</th>
        <th>Status</th>
    </tr>
    <?php
    foreach ($items as $product) {
        $priceFormatted = number_format($product['price'], 2);

        $statusClass = "";
        $statusText = "";
        if ($product['stock'] == 0) {
            $statusClass = "out-of-stock";
            $statusText = "GAMEOVER";
        } elseif ($product['stock'] <= 2) {
            $statusClass = "low-stock";
            $statusText = "LAST LIFE";
        } else {
            $statusClass = "available";
            $statusText = "READY P1";
        }
        
        echo "<tr>";
        echo "<td>{$product['name']}</td>";
        echo "<td>{$priceFormatted}</td>";
        echo "<td>{$product['category']}</td>";
        echo "<td>{$product['stock']}</td>";
        
        echo "<td><span class='{$statusClass}'>{$statusText}</span></td>"; 
        echo "</tr>";
    }
    ?>
</table>


</body>
</html>
