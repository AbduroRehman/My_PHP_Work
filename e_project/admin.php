<?php
require 'db.php';
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Administrator') { header("Location: login.php"); exit; }

if (isset($_POST['add_city'])) {
    $stmt = $pdo->prepare("INSERT INTO cities (name) VALUES (?)");
    $stmt->execute([$_POST['city_name']]);
}
if (isset($_GET['delete_city'])) {
    $stmt = $pdo->prepare("DELETE FROM cities WHERE id = ?");
    $stmt->execute([$_GET['delete_city']]);
}
if (isset($_GET['delete_user'])) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$_GET['delete_user']]);
}
if (isset($_POST['add_doctor'])) {
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password, role, name, address, phone, email, city_id, specialty) VALUES (?, ?, 'Doctor', ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['username'], $pass, $_POST['name'], $_POST['address'], $_POST['phone'], $_POST['email'], $_POST['city_id'], $_POST['specialty']]);
}

$cities = $pdo->query("SELECT * FROM cities")->fetchAll();
$doctors = $pdo->query("SELECT u.*, c.name as city_name FROM users u LEFT JOIN cities c ON u.city_id = c.id WHERE u.role = 'Doctor'")->fetchAll();
$patients = $pdo->query("SELECT u.*, c.name as city_name FROM users u LEFT JOIN cities c ON u.city_id = c.id WHERE u.role = 'Patient'")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f4f8; padding: 20px; }
        .section { background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-left: 4px solid #0056b3; }
        h2, h3 { color: #0056b3; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #0056b3; color: white; }
        input, select, textarea { padding: 8px; margin: 5px 0; width: 200px; display: inline-block; }
        .btn { background: #0056b3; color: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; }
        .btn-del { background: #dc3545; }
        .nav { text-align: right; margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="nav">Welcome, Admin | <a href="logout.php">Logout</a></div>
<h2>Administrator Management</h2>

<div class="section">
    <h3>Manage Cities</h3>
    <form method="POST">
        <input type="text" name="city_name" placeholder="City Name" required>
        <button type="submit" name="add_city" class="btn">Add City</button>
    </form>
    <table>
        <tr><th>City Name</th><th>Action</th></tr>
        <?php foreach ($cities as $city): ?>
        <tr>
            <td><?= htmlspecialchars($city['name']) ?></td>
            <td><a href="admin.php?delete_city=<?= $city['id'] ?>" class="btn btn-del">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="section">
    <h3>Add New Doctor</h3>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="name" placeholder="Doctor Name" required>
        <input type="text" name="specialty" placeholder="Specialty (e.g., Cardiologist)" required>
        <input type="text" name="phone" placeholder="Phone" required>
        <input type="email" name="email" placeholder="Email" required>
        <textarea name="address" placeholder="Address" required></textarea>
        <select name="city_id" required>
            <option value="">Select City</option>
            <?php foreach ($cities as $city): ?>
                <option value="<?= $city['id'] ?>"><?= htmlspecialchars($city['name']) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="add_doctor" class="btn">Add Doctor</button>
    </form>
</div>

<div class="section">
    <h3>Doctors List</h3>
    <table>
        <tr><th>Name</th><th>Specialty</th><th>City</th><th>Email</th><th>Action</th></tr>
        <?php foreach ($doctors as $doc): ?>
        <tr>
            <td><?= htmlspecialchars($doc['name']) ?></td>
            <td><?= htmlspecialchars($doc['specialty']) ?></td>
            <td><?= htmlspecialchars($doc['city_name']) ?></td>
            <td><?= htmlspecialchars($doc['email']) ?></td>
            <td><a href="admin.php?delete_user=<?= $doc['id'] ?>" class="btn btn-del">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="section">
    <h3>Patients List</h3>
    <table>
        <tr><th>Name</th><th>Phone</th><th>City</th><th>Email</th><th>Action</th></tr>
        <?php foreach ($patients as $pat): ?>
        <tr>
            <td><?= htmlspecialchars($pat['name']) ?></td>
            <td><?= htmlspecialchars($pat['phone']) ?></td>
            <td><?= htmlspecialchars($pat['city_name']) ?></td>
            <td><?= htmlspecialchars($pat['email']) ?></td>
            <td><a href="admin.php?delete_user=<?= $pat['id'] ?>" class="btn btn-del">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>