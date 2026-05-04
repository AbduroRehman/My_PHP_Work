<?php
session_start();

if(isset($_SESSION["user"])){
    header("Location: welcome.php");
    exit();
}

$error = "";

if(isset($_POST["btn_login"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(($username == "alibeti" && $password == "6969") || ($username == "musayb" && $password == "6767")){
        $_SESSION["user"] = $username;
        setcookie("user", $username, time() + 20);
        header("Location: welcome.php");
        exit();
    } else {
        $error = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <style>
        label { display: block; margin-bottom: 10px; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Login your Account</h1>
    
    <?php if($error) echo "<p class='error'>$error</p>"; ?>

    <form method="post">
        <label>Enter Your username:
            <input type="text" placeholder="enter username" name="username" required>
        </label>

        <label>Enter Your Password:
            <input type="password" placeholder="enter password" name="password" required>
        </label>

        <button type="submit" name="btn_login">Login Your Account</button>
    </form>
</body>
</html>