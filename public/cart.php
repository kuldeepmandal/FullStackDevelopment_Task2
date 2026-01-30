<?php
require '../config/db.php';
include '../includes/header.php';

$id = $_GET['id'] ?? null;

$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    echo "<p>Product not found.</p>";
    include '../includes/footer.php';
    exit;
}

$orderPlaced = false;

/* Place order */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $qty = (int)$_POST['quantity'];

    if ($qty > 0 && $qty <= $product['stock']) {
        $update = $pdo->prepare(
            "UPDATE products SET stock = stock - ? WHERE id = ?"
        );
        $update->execute([$qty, $id]);
        $orderPlaced = true;
    } else {
        $error = "Invalid quantity";
    }
}
?>

<!-- 🔝 Centered back button -->
<!-- <div class="top-nav center">
    <button onclick="window.location.href='index.php'">Back to Dashboard</button>
</div> -->

<?php if ($orderPlaced): ?>

    <!-- 😂 Funny success message -->
    <div class="success-box">
        <h2>🎉 Order Placed!</h2>
        <p>
            Your order is on its way 🛒<br>
            Our warehouse elves are running already 🧝‍♂️💨
        </p>

        <button onclick="window.location.href='index.php'">
            Back to Dashboard
        </button>
    </div>

<?php else: ?>

    <div class="form-box">
        <div class="top-nav center">
    <button onclick="window.location.href='index.php'">Back to Dashboard</button>
        </div>
        <h2>My Cart</h2>

        <?php if (!empty($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>

        <form method="post">
            <label>Product Name</label>
            <input type="text" value="<?= htmlspecialchars($product['product_name']) ?>" readonly>

            <label>Price</label>
            <input type="text" value="<?= $product['price'] ?>" readonly>

            <label>Quantity</label>
            <input type="number" name="quantity" min="1" max="<?= $product['stock'] ?>" required>

            <button type="submit">Place Order</button>
        </form>
    </div>

<?php endif; ?>

<?php include '../includes/footer.php'; ?>
