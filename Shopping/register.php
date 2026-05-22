<?php
include('session.php');
checkAlreadyLoggedIn();
include('db.php');

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if (!empty($username) && !empty($email) && !empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        $sql_check = "SELECT id FROM users WHERE email = '$email'";
        $result_check = mysqli_query($conn, $sql_check);
        
        if (mysqli_num_rows($result_check) > 0) {
            $error = "Email address is already registered.";
        } else {
            $sql_insert = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            if (mysqli_query($conn, $sql_insert)) {
                $success = "Registration successful! You can now log in.";
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
    } else {
        $error = "All fields are strictly required.";
    }
}

include('header.php');
?>

<style>
    .form-container {
        width: 1000px;
        margin: 50px auto;
        display: flex;
        justify-content: center;
    }
    .form-card {
        width: 450px;
        background-color: #ffffff;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 40px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }
    .form-card h2 {
        color: #1e3a8a;
        margin-bottom: 25px;
        text-align: center;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #4b5563;
    }
    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #text-align;
        border: 1px solid #d1d5db;
        border-radius: 5px;
        font-size: 16px;
    }
    .form-group input:focus {
        border-color: #3b82f6;
        outline: none;
    }
    .submit-btn {
        width: 100%;
        padding: 12px;
        background-color: #3b82f6;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
    }
    .submit-btn:hover {
        background-color: #1e3a8a;
    }
    .message {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        text-align: center;
        font-weight: bold;
    }
    .msg-error {
        background-color: #fee2e2;
        color: #dc2626;
    }
    .msg-success {
        background-color: #dcfce7;
        color: #16a34a;
    }
</style>

<div class="form-container">
    <div class="form-card">
        <h2>Create Account</h2>
        
        <?php if(!empty($error)): ?>
            <div class="message msg-error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if(!empty($success)): ?>
            <div class="message msg-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username">
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <button type="submit" class="submit-btn">Register</button>
        </form>
    </div>
</div>

</body>
</html>