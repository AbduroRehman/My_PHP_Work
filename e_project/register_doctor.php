<?php
require 'db.php';
$message = '';

$specialties = ["Cardiologist", "Dermatologist", "Pediatrician", "Neurologist", "General Physician", "Orthopedic", "Gynecologist"];

$pakistan_cities = [
    "Karachi", "Lahore", "Faisalabad", "Rawalpindi", "Gujranwala", 
    "Peshawar", "Multan", "Saidu Sharif", "Hyderabad", "Islamabad", 
    "Quetta", "Sargodha", "Sialkot", "Bahawalpur", "Sukkur", 
    "Jhang", "Sheikhupura", "Larkana", "Gujrat", "Mardan", 
    "Kasur", "Rahim Yar Khan", "Sahiwal", "Okara", "Wah Cantonment", 
    "Dera Ghazi Khan", "Mirpur Khas", "Nawabshah", "Chiniot", "Kamoke"
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $specialty = $_POST['specialty'];
    $city_name = $_POST['city_name']; 

    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        $message = "Username already exists.";
    } else {
        // Direct string text values insert hongi ab bina kisi constraint error ke
        $stmt = $pdo->prepare("INSERT INTO users (username, password, role, name, address, phone, email, specialty, city_id) VALUES (?, ?, 'Doctor', ?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$username, $password, $name, $address, $phone, $email, $specialty, $city_name])) {
            header("Location: login.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Registration</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f4f8; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 400px; border-top: 5px solid #0056b3; }
        h2 { text-align: center; color: #0056b3; margin-bottom: 20px; }
        input, select, textarea { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #0056b3; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; margin-top: 10px; }
        button:hover { background-color: #004085; }
        .error { color: red; text-align: center; margin-bottom: 10px; }
        .link { text-align: center; margin-top: 15px; font-size: 14px; }
        .link a { color: #0056b3; text-decoration: none; }
    </style>
</head>
<body>
<div class="container">
    <h2>Doctor Registration</h2>
    <?php if ($message): ?><p class="error"><?= $message ?></p><?php endif; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username (Unique ID)" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="name" placeholder="Dr. Full Name" required>
        
        <select name="specialty" required>
            <option value="">Select Specialty</option>
            <?php foreach ($specialties as $spec): ?>
                <option value="<?= $spec ?>"><?= $spec ?></option>
            <?php endforeach; ?>
        </select>

        <select name="city_name" required>
            <option value="">Select City</option>
            <?php foreach ($pakistan_cities as $city): ?>
                <option value="<?= $city ?>"><?= $city ?></option>
            <?php endforeach; ?>
        </select>

        <textarea name="address" placeholder="Clinic/Hospital Address" required></textarea>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <input type="email" name="email" placeholder="Email Address" required>
        
        <button type="submit">Register as Doctor</button>
    </form>
    <div class="link"><a href="index.php">← Back to Home</a></div>


</div>
</body>
</html>