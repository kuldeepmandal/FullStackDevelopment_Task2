<?php
require 'auth.php';
require '../config/db.php';
include '../includes/header.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM products WHERE id=?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
        "UPDATE products SET product_name=?, supplier=?, price=?, stock=? WHERE id=?"
    );
    $stmt->execute([
        $_POST['product_name'],
        $_POST['supplier'],
        $_POST['price'],
        $_POST['stock'],
        $id
    ]);
    header("Location: admin.php");
}
?>
<button onclick="window.location.href='admin.php'">
    Back to Admin Panel
</button>
<br><br>
<form method="post">
    <input type="text" name="product_name" value="<?= htmlspecialchars($product['product_name']) ?>" required><br>
    <input type="text" name="supplier" value="<?= htmlspecialchars($product['supplier']) ?>" required><br>
    <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br>
    <input type="number" name="stock" value="<?= $product['stock'] ?>" required><br><br>
    <button type="submit">Update</button>
</form>

<?php include '../includes/footer.php'; ?>
