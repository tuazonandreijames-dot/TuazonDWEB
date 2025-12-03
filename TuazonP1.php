<?php
declare(strict_types=1); // I turned strict types on

$storeName = "Cartridge Cove";
$tagline   = "Classic games para sa classic heartbreak";
$owner     = "Andrei James G. Tuazon";
$section   = "WD-201";
$currency  = "₱";

// this where the global tax goes
$tax_rate = 12; 

$cartridges = [
    "NES Console"               => ["price" => 5500, "stock" => 3],
    "Sega Genesis Model 2"      => ["price" => 3500, "stock" => 5],
    "Super Mario World (SNES)"  => ["price" => 1500, "stock" => 0],
    "Game Boy (Grey)"           => ["price" => 4000, "stock" => 1],
    "PlayStation 1 (PSX)"       => ["price" => 4500, "stock" => 10],

    // I added 3 to 5 more products here
    "Donkey Kong Country"       => ["price" => 1100, "stock" => 12],
    "Metal Gear Solid (PS1)"    => ["price" => 1800, "stock" => 4],
    "Pac-Man Cartridge"         => ["price" => 700,  "stock" => 20],
];

function get_reorder_message(int $stock): string {
    return ($stock < 10) ? "Yes" : "No";
}


function get_total_value(float $price, int $qty): float {
    return $price * $qty;
}


function get_tax_due(float $price, int $qty, int $tax = 0): float {
    return ($price * $qty) * ($tax / 100);
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
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>

<body>

<h1><?= $storeName ?></h1>
<h2><?= $tagline ?></h2>
<h3>Owned by: <?= $owner ?> | Section: <?= $section ?></h3>

<table>
    <tr>
        <th>Product</th>
        <th>Price (₱)</th>
        <th>Stock</th>
        <th>Reorder?</th>
        <th>Total Value</th>
        <th>Tax (<?= $tax_rate ?>%)</th>
    </tr>

    <?php
    foreach ($cartridges as $product_name => $data) {

        $price = $data["price"];
        $stock = $data["stock"];

        echo "<tr>";

        echo "<td>$product_name</td>";

        echo "<td>" . number_format($price, 2) . "</td>";
        echo "<td>$stock</td>";

        echo "<td>" . get_reorder_message($stock) . "</td>";

        echo "<td>" . number_format(get_total_value($price, $stock), 2) . "</td>";

        echo "<td>" . number_format(get_tax_due($price, $stock, $tax_rate), 2) . "</td>";

        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
