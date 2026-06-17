<?php
require 'db.php';
session_start();
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['name'] = $user['name'];

        if ($user['role'] == 'Administrator') header("Location: admin.php");
        elseif ($user['role'] == 'Doctor') header("Location: doctor.php");
        else header("Location: patient.php");
        exit;
    } else {
        $message = "Invalid Username or Password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CARE Login</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f4f8; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .container { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 350px; border-top: 5px solid #0056b3; }
        h2 { text-align: center; color: #0056b3; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #0056b3; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #004085; }
        .error { color: red; text-align: center; }
        .link { text-align: center; margin-top: 15px; }
        .link a { color: #0056b3; text-decoration: none; }
    </style>
</head>
<body>
<div class="container">
    <h2>CARE Login</h2>
    <?php if ($message): ?><p class="error"><?= $message ?></p><?php endif; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <div class="link"><a href="register.php">New Patient Registration</a></div>
    <div style="text-align: center; margin-top: 15px; font-size: 14px;">
        Don't have an account? <a href="register.php" style="color: #0056b3; text-decoration: none; font-weight: bold;">Register Here</a>
        <br><br>
        <a href="index.php" style="color: #0056b3; text-decoration: none; font-weight: bold;">← Back to Main Home</a>
    </div>
</div>
</body>
</html>