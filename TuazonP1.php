<?php
$storeName = "Tambay-Tech";
$tagline = "Build namin pang-forever. Sana all...";
$owner = "Andrei James G. Tuazon";
$section = "WD-201";
$currency = "₱";

$item1 = [
    "name" => "NVIDIA RTX 4080 GPU",
    "price" => "75000",
    "stock" => 3,
    "category" => "Graphics Card"
];
$item2 = [
    "name" => "AMD Ryzen 7 7700X CPU",
    "price" => 18000,
    "stock" => "5",
    "category" => "Processor"
];
$item3 = [
    "name" => "Corsair 32GB DDR5 RAM",
    "price" => "8500",
    "stock" => 0,
    "category" => "Memory"
];
$item4 = [
    "name" => "Lian Li Lancool 216 Case",
    "price" => 5500,
    "stock" => 12,
    "category" => "Chassis"
];

$products = [$item1, $item2, $item3, $item4];

$totalPrice = $item1["price"] + $item2["price"] + $item3["price"] + $item4["price"];
$totalStock = $item1["stock"] + $item2["stock"] + $item3["stock"] + $item4["stock"];

$productCount = count($products);

$overallStatus = "";
if ($totalStock > 20) {
    $overallStatus = "Warehouse is full! Massive inventory ready for dispatch.";
} elseif ($totalStock > 0) {
    $overallStatus = "Stock levels are good! Ship your dream PC today.";
} else {
    $overallStatus = "Critical Alert: Our shelves are currently bare.";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $storeName ?></title>

    <style>
        body {
            font-family: 'Consolas', monospace;
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            color: #d8d8ff;
            background-size: cover;
            background-repeat: no-repeat;
            padding: 20px;
        }
        h1 {
            color: #00ffff;
            text-shadow: 0 0 5px #00ffff, 0 0 10px #00ffff;
            padding-bottom: 5px;
            margin-bottom: 5px;
        }
        h2 {
            font-style: italic;
            color: #a0a0ff;
            margin-top: 0;
            margin-bottom: 20px;
        }
        h1, h2, h3, .status-info {
            text-align: center;
        }
        table {
            width: 85%;
            margin: 30px auto;
            border-collapse: collapse;
            background: rgba(30, 30, 50, 0.9);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
        }
        th, td {
            border: 1px solid #444;
            padding: 15px 10px;
            text-align: center;
        }
        th {
            background: #00ffff;
            color: #111;
            font-weight: bold;
            text-transform: uppercase;
        }
        tr:hover {
            background: rgba(40, 40, 70, 0.9);
        }
        .available {
            color: #33ff33;
            font-weight: bold;
        }
        .low-stock {
            color: #ffff33;
            font-weight: bold;
        }
        .out-of-stock {
            color: #ff3333;
            font-weight: bold;
        }
        .status-info {
            padding: 10px;
            background: rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<h1><?= $storeName ?></h1>
<h2><?= $tagline ?></h2>
<h3>Owned by: <?= $owner ?> | Section: <?= $section ?></h3>

<div class="status-info">
    <p>
        <?= "Total Product Types: $productCount" ?> <br>
        <?= "Combined Total Stock: $totalStock units" ?> <br>
        <?= "Total Catalog Value: $currency" . number_format($totalPrice, 2) ?>
    </p>
    <p>
        *Store Message: **<?= $overallStatus ?>***
    </p>
</div>


<table>
    <tr>
        <th>Product Name</th>
        <th>Category</th>
        <th>Price (<?= $currency ?>)</th>
        <th>Stock</th>
        <th>Availability Status</th>
    </tr>

    <?php
    foreach ($products as $item) {
        $itemName = $item["name"];
        $itemCategory = $item["category"];
        $itemPrice = number_format($item["price"], 2);
        $itemStock = $item["stock"];

        $statusClass = "";
        $statusText = "";

        if ($itemStock > 5) {
            $statusClass = "available";
            $statusText = "HIGH STOCK!";
        } elseif ($itemStock > 0 && $itemStock <= 5) {
            $statusClass = "low-stock";
            $statusText = "Low Stock ($itemStock left)";
        } else {
            $statusClass = "out-of-stock";
            $statusText = "OUT OF STOCK";
        }

    ?>

    <tr>
        <td><?= $itemName ?></td>
        <td><?= $itemCategory ?></td>
        <td><?= $itemPrice ?></td>
        <td><?= $itemStock ?></td>
        <td>
            <span class="<?= $statusClass ?>">
                <?= $statusText ?>
            </span>
        </td>
    </tr>

    <?php
    }
    ?>

</table>



</body>
</html>