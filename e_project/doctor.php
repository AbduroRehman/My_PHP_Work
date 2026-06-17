<?php
require 'db.php';
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Doctor') { header("Location: login.php"); exit; }

$doctor_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $stmt = $pdo->prepare("UPDATE users SET name = ?, address = ?, phone = ?, email = ?, specialty = ?, availability = ? WHERE id = ?");
    $stmt->execute([$_POST['name'], $_POST['address'], $_POST['phone'], $_POST['email'], $_POST['specialty'], $_POST['availability'], $doctor_id]);
}

$stmt = $pdo->prepare("SELECT u.*, c.name as city_name FROM users u LEFT JOIN cities c ON u.city_id = c.id WHERE u.id = ?");
$stmt->execute([$doctor_id]);
$profile = $stmt->fetch();

$stmt = $pdo->prepare("SELECT a.*, u.name as patient_name, u.phone as patient_phone FROM appointments a JOIN users u ON a.patient_id = u.id WHERE a.doctor_id = ?");
$stmt->execute([$doctor_id]);
$appointments = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f4f8; padding: 20px; }
        .section { background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-left: 4px solid #0056b3; }
        h2, h3 { color: #0056b3; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #0056b3; color: white; }
        input, textarea { padding: 8px; margin: 5px 0; width: 100%; max-width: 400px; display: block; }
        .btn { background: #0056b3; color: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; }
        .nav { text-align: right; margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="nav">Welcome, Dr. <?= htmlspecialchars($profile['name']) ?> | <a href="logout.php">Logout</a></div>
<h2>Doctor Panel</h2>

<div class="section">
    <h3>Modify Profile & Availability</h3>
    <form method="POST">
        <label>Name:</label><input type="text" name="name" value="<?= htmlspecialchars($profile['name']) ?>" required>
        <label>Specialty:</label><input type="text" name="specialty" value="<?= htmlspecialchars($profile['specialty']) ?>" required>
        <label>Phone:</label><input type="text" name="phone" value="<?= htmlspecialchars($profile['phone']) ?>" required>
        <label>Email:</label><input type="email" name="email" value="<?= htmlspecialchars($profile['email']) ?>" required>
        <label>Address:</label><textarea name="address" required><?= htmlspecialchars($profile['address']) ?></textarea>
        <label>Availability (e.g., Mon-Fri 9AM-5PM):</label><input type="text" name="availability" value="<?= htmlspecialchars($profile['availability']) ?>" placeholder="Day/Week/Month rules" required>
        <button type="submit" name="update_profile" class="btn">Update Details</button>
    </form>
</div>

<div class="section">
    <h3>Patient Appointments</h3>
    <table>
        <tr><th>Patient Name</th><th>Contact Phone</th><th>Date Requested</th><th>Status</th></tr>
        <?php foreach ($appointments as $app): ?>
        <tr>
            <td><?= htmlspecialchars($app['patient_name']) ?></td>
            <td><?= htmlspecialchars($app['patient_phone']) ?></td>
            <td><?= htmlspecialchars($app['appointment_date']) ?></td>
            <td><?= htmlspecialchars($app['status']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>