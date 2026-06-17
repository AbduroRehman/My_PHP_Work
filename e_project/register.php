<?php
require 'db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $city_id = $_POST['city_id'];

    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        $message = "Username already exists.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (username, password, role, name, address, phone, email, city_id) VALUES (?, ?, 'Patient', ?, ?, ?, ?, ?)");
        if ($stmt->execute([$username, $password, $name, $address, $phone, $email, $city_id])) {
            header("Location: login.php");
            exit;
        }
    }
}

// Database se saare shehar uthaye ga automatic numeric IDs ke sath
$cities = $pdo->query("SELECT * FROM cities ORDER BY name ASC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Registration</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f4f8; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 400px; border-top: 5px solid #0056b3; }
        h2 { text-align: center; color: #0056b3; margin-bottom: 20px; }
        input, select, textarea { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #0056b3; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #004085; }
        .error { color: red; text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Patient Registration</h2>
    <?php if ($message): ?><p class="error"><?= $message ?></p><?php endif; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username (Unique ID)" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="name" placeholder="Full Name" required>
        <textarea name="address" placeholder="Address" required></textarea>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <input type="email" name="email" placeholder="Email Address" required>
        
        <select name="city_id" required>
            <option value="">Select City</option>
            <?php foreach ($cities as $city): ?>
                <option value="<?= $city['id'] ?>"><?= htmlspecialchars($city['name']) ?></option>
            <?php endforeach; ?>
        </select>
        
        <button type="submit">Register</button>
    </form>

    <div style="text-align: center; margin-top: 15px; font-size: 14px;">
        Are you a Doctor? <a href="register_doctor.php" style="color: #0056b3; text-decoration: none; font-weight: bold;">Register Here</a>
        <br><br>
        <a href="index.php" style="color: #0056b3; text-decoration: none; font-weight: bold;">← Back to Home</a>
    </div>
</div>
</body>
</html>