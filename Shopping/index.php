<?php
include('session.php');
include('header.php');
?>

<style>
    .main-container {
        width: 1000px;
        margin: 40px auto;
        text-align: center;
    }
    .hero-section {
        background-color: #ffffff;
        padding: 60px;
        border-radius: 8px;
        border: 1px solid #d1d5db;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }
    .hero-section h2 {
        color: #1e3a8a;
        font-size: 32px;
        margin-bottom: 20px;
    }
    .hero-section p {
        font-size: 18px;
        color: #6b7280;
        margin-bottom: 30px;
    }
    .btn-primary {
        display: inline-block;
        background-color: #3b82f6;
        color: #ffffff;
        padding: 12px 30px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
    }
    .btn-primary:hover {
        background-color: #1e3a8a;
    }
</style>

<div class="main-container">
    <div class="hero-section">
        <h2>Welcome to Our Shopping Marketplace</h2>
        <p>Join us today to manage and explore the best products available.</p>
        <a href="register.php" class="btn-primary">Create an Account</a>
    </div>
</div>



</body>
</html>