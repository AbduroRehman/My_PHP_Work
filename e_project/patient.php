<?php
require 'db.php';
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Patient') { header("Location: login.php"); exit; }

$patient_id = $_SESSION['user_id'];
$search_city = $_GET['city_name'] ?? '';
$search_specialty = $_GET['specialty'] ?? '';

// Array of Pakistan cities to match register.php
$pakistan_cities = [
    "Karachi", "Lahore", "Faisalabad", "Rawalpindi", "Gujranwala", 
    "Peshawar", "Multan", "Saidu Sharif", "Hyderabad", "Islamabad", 
    "Quetta", "Sargodha", "Sialkot", "Bahawalpur", "Sukkur", 
    "Jhang", "Sheikhupura", "Larkana", "Gujrat", "Mardan", 
    "Kasur", "Rahim Yar Khan", "Sahiwal", "Okara", "Wah Cantonment", 
    "Dera Ghazi Khan", "Mirpur Khas", "Nawabshah", "Chiniot", "Kamoke"
];

if (isset($_POST['book_appointment'])) {
    $stmt = $pdo->prepare("INSERT INTO appointments (patient_id, doctor_id, appointment_date) VALUES (?, ?, ?)");
    $stmt->execute([$patient_id, $_POST['doctor_id'], $_POST['appointment_date']]);
    echo "<script>alert('Appointment requested successfully!');</script>";
}

// Fixed Search Query: Matching directly with text value of city_id
$query = "SELECT * FROM users WHERE role = 'Doctor'";
$params = [];

if ($search_city) { 
    $query .= " AND city_id = ?"; 
    $params[] = $search_city; 
}
if ($search_specialty) { 
    $query .= " AND specialty LIKE ?"; 
    $params[] = "%$search_specialty%"; 
}

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$doctors = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f4f8; padding: 20px; }
        .section { background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-left: 4px solid #0056b3; }
        h2, h3 { color: #0056b3; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #0056b3; color: white; }
        input, select { padding: 8px; margin: 5px; width: 200px; box-sizing: border-box; }
        .btn { background: #0056b3; color: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; }
        .btn:hover { background-color: #004085; }
        .nav { text-align: right; margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="nav">Welcome, <?= htmlspecialchars($_SESSION['name']) ?> | <a href="logout.php">Logout</a></div>

<h2>Patient Panel</h2>

<div class="nav">
    Welcome, <?= htmlspecialchars($_SESSION['name']) ?> | 
    <a href="index.php" style="color: #0056b3; font-weight: bold; text-decoration: none; margin-right: 15px;">Home Portal</a> | 
    <a href="logout.php" style="color: red; text-decoration: none;">Logout</a>
</div>

<div class="section">
    <h3>Search Specialists</h3>
    <form method="GET">
        <select name="city_name">
            <option value="">All Cities</option>
            <?php foreach ($pakistan_cities as $city): ?>
                <option value="<?= $city ?>" <?= $search_city == $city ? 'selected' : '' ?>><?= $city ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="specialty" placeholder="Specialty (e.g., Cardiologist)" value="<?= htmlspecialchars($search_specialty) ?>">
        <button type="submit" class="btn">Filter</button>
    </form>
</div>

<div class="section">
    <h3>Available Specialists & Booking</h3>
    <table>
        <tr><th>Doctor Name</th><th>Specialty</th><th>City</th><th>Availability</th><th>Book Appointment</th></tr>
        <?php if (count($doctors) > 0): ?>
            <?php foreach ($doctors as $doc): ?>
            <tr>
                <td>Dr. <?= htmlspecialchars($doc['name']) ?></td>
                <td><?= htmlspecialchars($doc['specialty']) ?></td>
                <td><?= htmlspecialchars($doc['city_id']) ?></td>
                <td><?= htmlspecialchars($doc['availability'] ?? 'Not Specified') ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="doctor_id" value="<?= $doc['id'] ?>">
                        <input type="date" name="appointment_date" required>
                        <button type="submit" name="book_appointment" class="btn">Book</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align: center; color: #777;">No doctors found matching your criteria.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
</body>
</html>