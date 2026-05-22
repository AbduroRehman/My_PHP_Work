<?php
include('session.php');
checkAlreadyLoggedIn();
include('db.php');

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header("Location: welcome.php");
                exit();
            } else {
                $error = "Invalid combination of email and password.";
            }
        } else {
            $error = "No account found matching that email.";
        }
    } else {
        $error = "Please fill in all entry fields.";
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
</style>

<div class="form-container">
    <div class="form-card">
        <h2>Account Login</h2>
        
        <?php if(!empty($error)): ?>
            <div class="message msg-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <button type="submit" class="submit-btn">Login</button>
        </form>
    </div>
</div>

</body>
</html>