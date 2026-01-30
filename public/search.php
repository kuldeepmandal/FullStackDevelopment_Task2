<?php
require '../config/db.php';
include '../includes/header.php';

$query = "SELECT * FROM products WHERE 1";
$params = [];

if (!empty($_GET['supplier'])) {
    $query .= " AND supplier LIKE ?";
    $params[] = "%" . $_GET['supplier'] . "%";
}

if (!empty($_GET['max_price'])) {
    $query .= " AND price <= ?";
    $params[] = $_GET['max_price'];
}

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$results = $stmt->fetchAll();
?>

<div class="top-nav">
    <button onclick="window.location.href='index.php'">Back to Dashboard</button>
</div>

<div class="form-box">
<form method="get">
    <label>Supplier:</label>
    <input type="text" name="supplier">

    <label>Max Price:</label>
    <input type="number" step="1" name="max_price">

    <button type="submit">Search</button>
</form>
</div>

<table>
<?php foreach ($results as $r): ?>
<tr>
    <td><?= htmlspecialchars($r['product_name']) ?></td>
    <td><?= htmlspecialchars($r['supplier']) ?></td>
    <td><?= $r['price'] ?></td>
    <td><?= $r['stock'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<?php include '../includes/footer.php'; ?>
