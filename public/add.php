<?php
require 'auth.php';
require '../config/db.php';
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
        "INSERT INTO products (product_name, supplier, price, stock)
         VALUES (?, ?, ?, ?)"
    );
    $stmt->execute([
        $_POST['product_name'],
        $_POST['supplier'],
        $_POST['price'],
        $_POST['stock']
    ]);
    header("Location: index.php");
}
?>
<hr>
<button onclick="window.location.href='admin.php'">
    Back to Admin Panel
</button>

<form method="post">
    <label>Product Name:</label><br>
    <input type="text" name="product_name" required><br>

    <label>Supplier:</label><br>
    <input type="text" name="supplier" required><br>

    <label>Price:</label><br>
    <input type="number" step="0.01" name="price" required><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" required><br><br>

    <button type="submit">Add Product</button>
</form>

<?php include '../includes/footer.php'; ?>
