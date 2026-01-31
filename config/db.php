<?php
$host = "localhost";
$db   = "np02cs4a240051"; 
$user = "root";
$pass = "";

// $host = "localhost";
// $db   = "np02cs4a240051"; 
// $user = "np02cs4a240051";
// $pass = "19it0DoRkp";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=UTF8",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Database connection failed");
}
