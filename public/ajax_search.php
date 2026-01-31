<?php
require '../config/db.php';

$q = $_GET['q'] ?? '';

if (strlen($q) < 1) {
    echo json_encode([]);
    exit;
}

$stmt = $pdo->prepare(
    "SELECT DISTINCT product_name 
     FROM products 
     WHERE product_name LIKE ? 
     LIMIT 5"
);

$stmt->execute([$q . '%']);
$results = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo json_encode($results);
