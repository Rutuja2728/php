<?php
session_start();

// Admin login check
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['admin'] = true;
    } else {
        echo "Invalid credentials!";
    }
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin.php");
    exit();
}

// Add notice
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_notice'])) {
    $notice = $_POST['notice'];

    if (!empty($notice)) {
        $conn = new mysqli('localhost', 'root', '', 'school');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO notices (notice) VALUES (?)");
        $stmt->bind_param("s", $notice);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <?php if (!isset($_SESSION['admin'])): ?>
        <h1>Admin Login</h1>
        <form method="POST" action="">
            Username: <input type="text" name="username" required><br>
            Password: <input type="password" name="password" required><br>
            <button type="submit" name="login">Login</button>
        </form>
    <?php else: ?>
        <h1>Add Notice</h1>
        <form method="POST" action="">
            <textarea name="notice" rows="5" cols="40" required></textarea><br>
            <button type="submit" name="add_notice">Add Notice</button>
        </form>
        <a href="admin.php?logout=1">Logout</a>
    <?php endif; ?>
</body>
</html>