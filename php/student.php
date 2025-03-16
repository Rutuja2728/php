<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'school');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT notice, uploaded_time FROM notices ORDER BY uploaded_time DESC LIMIT 5");
$notices = $result->fetch_all(MYSQLI_ASSOC);
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <style>
        .notice-card {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
        }
        marquee {
            color: blue;
        }
    </style>
</head>
<body>
    <h1>Welcome, Student!</h1>
    <marquee behavior="scroll" direction="left">Latest Notices</marquee>
    <?php foreach ($notices as $notice): ?>
        <div class="notice-card">
            <p><?php echo htmlspecialchars($notice['notice']); ?></p>
            <small><?php echo $notice['uploaded_time']; ?></small>
        </div>
    <?php endforeach; ?>
    <a href="logout.php">Logout</a>
</body>
</html>