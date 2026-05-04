<?php require("session.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <nav>
        <a href="logout.php">Log Out</a>
    </nav>

    <h1>Welcome, <?php echo htmlspecialchars($_SESSION["user"]); ?>!</h1>
    
    <p>You have successfully accessed the protected area.</p>
</body>
</html>