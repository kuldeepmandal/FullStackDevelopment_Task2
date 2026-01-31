<?php
session_start();

/* Hashed password for cool123 */
$storedHash = '$2y$10$q6NvJPHbTgsAgm/2NogU3.CVTFBz4h2i4TTlQjCysxE77dVHWX6mK';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && password_verify($password, $storedHash)) {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}

include '../includes/header.php';
?>

<div class="login-box">
    <div class="top-nav center">
<button onclick="window.location.href='index.php'">Back to Dashboard</button>
    </div>
    <h3>Admin Login</h3>

    <?php if (!empty($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
