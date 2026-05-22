<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Website</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f0f4f8;
            color: #333;
        }
        .header-bar {
            width: 1000px;
            height: 70px;
            background-color: #1e3a8a;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-bar h1 {
            color: #ffffff;
            font-size: 24px;
        }
        .header-nav a {
            color: #ffffff;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }
        .header-nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header-bar">
        <h1>ShopCentral</h1>
        <div class="header-nav">
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="welcome.php">Dashboard</a>
                <a href="createproduct.php">Add Product</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="index.php">Home</a>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php endif; ?>
        </div>
    </div>