<?php
include('session.php');
checkLogin();
include('header.php');
?>

<style>
    .workspace {
        width: 1000px;
        margin: 40px auto;
        overflow: hidden;
    }
    .content-area {
        width: 750px;
        float: right;
        background-color: #ffffff;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 30px;
        min-height: 400px;
    }
    .content-area h2 {
        color: #1e3a8a;
        margin-bottom: 15px;
        font-size: 26px;
    }
    .content-area p {
        font-size: 16px;
        color: #4b5563;
        line-height: 1.6;
    }
    .welcome-card {
        background-color: #eff6ff;
        border-left: 5px solid #3b82f6;
        padding: 15px;
        margin-top: 20px;
        border-radius: 0 5px 5px 0;
    }
</style>

<div class="workspace">
    <?php include('sideBar.php'); ?>
    
    <div class="content-area">
        <h2>Dashboard</h2>
        <p>Hello, <strong><?php echo $_SESSION['username']; ?></strong>! Welcome back to your account profile overview page.</p>
        
        <div class="welcome-card">
            <p>Use the side navigation panel to begin adding retail listings or to configure your shopping catalog setup parameters smoothly.</p>
        </div>
    </div>
</div>

</body>
</html>