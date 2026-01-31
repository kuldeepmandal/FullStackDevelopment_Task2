<?php
require '../config/db.php';

$stmt = $pdo->query("SELECT id, product_name, stock FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($products);
