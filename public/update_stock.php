<?php
require '../config/db.php';

$data = json_decode(file_get_contents("php://input"), true);

$stmt = $pdo->prepare("UPDATE products SET stock=? WHERE id=?");
$stmt->execute([$data['stock'], $data['id']]);
