<?php
require '../config/db.php';
include '../includes/header.php';

/* Initialize results to avoid warnings */
$results = [];

$query = "SELECT * FROM products WHERE 1";
$params = [];

/* Product name filter */
if (!empty($_GET['product'])) {
    $query .= " AND product_name LIKE ?";
    $params[] = "%" . $_GET['product'] . "%";
}

/* Max price filter */
if (!empty($_GET['max_price'])) {
    $query .= " AND price <= ?";
    $params[] = $_GET['max_price'];
}

/* Run query only when at least one filter is used */
if (!empty($_GET['product']) || !empty($_GET['max_price'])) {
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $results = $stmt->fetchAll();
}
?>

<!-- Back button -->
<div class="top-nav">
    <button onclick="window.location.href='index.php'">Back to Dashboard</button>
</div>

<!-- Search Form -->
<div class="form-box">
<form method="get">

    <label for="productInput">Product:</label>
    <input type="text" name="product" id="productInput" autocomplete="off">

    <div id="suggestions"></div>

    <label for="max_price">Max Price:</label>
    <input type="number" step="1" name="max_price" id="max_price">

    <button type="submit">Search</button>

</form>
</div>

<!-- Search Results -->
<?php if (!empty($results)): ?>
<table>
<tr>
    <th>Product</th>
    <th>Supplier</th>
    <th>Price</th>
    <th>Stock</th>
    <th>My Cart</th>
</tr>

<?php foreach ($results as $r): ?>
<tr>
    <td><?= htmlspecialchars($r['product_name']) ?></td>
    <td><?= htmlspecialchars($r['supplier']) ?></td>
    <td><?= $r['price'] ?></td>
    <td>
        <?= $r['stock'] ?>
        <?php if ($r['stock'] < 10): ?>
            <span class="low-stock"> Low Stock!</span>
        <?php endif; ?>
    </td>
    <td>
        <?php if ($r['stock'] > 0): ?>
            <a href="cart.php?id=<?= $r['id'] ?>">
                <button>Add to Cart</button>
            </a>
        <?php else: ?>
            Out of stock
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>

<!-- Ajax autocomplete script -->
<script src="../assets/js/ajax_search.js"></script>

<?php include '../includes/footer.php'; ?>
