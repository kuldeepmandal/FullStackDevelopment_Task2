<?php
require 'auth.php';
require '../config/db.php';
include '../includes/header.php';

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll();
?>

<h2>Admin Panel</h2>

<div class="top-nav">
    <a href="add.php"><button>Add Product</button></a>
    <a href="logout.php"><button>Logout</button></a>
</div>

<table>
<tr>
    <th>Name</th>
    <th>Stock</th>
    <th>Actions</th>
</tr>

<?php foreach ($products as $p): ?>
<tr>
    <td><?= htmlspecialchars($p['product_name']) ?></td>
    <td><?= $p['stock'] ?></td>
    <td>
        <a href="edit.php?id=<?= $p['id'] ?>">
    <button class="btn-edit">Edit</button>
    </a>

    <a href="delete.php?id=<?= $p['id'] ?>" 
    onclick="return confirm('Delete product?')">
        <button class="btn-delete">Delete</button>
    </a>

    </td>
</tr>
<?php endforeach; ?>
</table>

<?php include '../includes/footer.php'; ?>
