<?php
require '../config/db.php';
include '../includes/header.php';

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll();
?>

<div class="top-nav">
    <a href="search.php"><button>Search</button></a>
    <a href="login.php"><button>Admin Login</button></a>
</div>

<table>
<tr>
    <th>Name</th>
    <th>Supplier</th>
    <th>Price</th>
    <th>Stock</th>
    <th>My Cart</th>
</tr>

<?php foreach ($products as $p): ?>
<tr>
    <td><?= htmlspecialchars($p['product_name']) ?></td>
    <td><?= htmlspecialchars($p['supplier']) ?></td>
    <td><?= $p['price'] ?></td>
    <td>
        <?= $p['stock'] ?>
        <?php if ($p['stock'] < 10 && $p['stock'] > 0): ?>
            <span class="low-stock"> Low Stock!</span>
        <?php endif; ?>
    </td>
    <td>
        <?php if ($p['stock'] > 0): ?>
            <a href="cart.php?id=<?= $p['id'] ?>">
                <button>Add to Cart</button>
            </a>
        <?php else: ?>
            Out of stock
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</table>

<?php include '../includes/footer.php'; ?>
