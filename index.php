<!DOCTYPE html>
<html>
<head>
    <title>School Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Welcome to the School Management System</h1>
    <div class="container">
        <a href="admin.php" class="button">Admin Login</a>
        <a href="register.php" class="button">Student Registration</a>
        <a href="login.php" class="button">Student Login</a>
    </div>
</body>
</html>