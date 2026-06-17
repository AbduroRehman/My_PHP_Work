<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CARE Medical Services Portal</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f4f8; margin: 0; padding: 0; }
        .header { background-color: #0056b3; color: white; padding: 40px 20px; text-align: center; }
        .header h1 { margin: 0; font-size: 32px; }
        .header p { margin: 10px 0 0 0; font-size: 18px; opacity: 0.9; }
        .main-container { max-width: 900px; margin: 40px auto; padding: 0 20px; text-align: center; }
        .welcome-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin-bottom: 30px; }
        .grid-container { display: flex; justify-content: space-between; gap: 20px; margin-top: 20px; }
        .card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); flex: 1; border-top: 5px solid #0056b3; text-align: center; }
        .card h3 { color: #0056b3; margin-top: 0; font-size: 22px; }
        .card p { color: #555; font-size: 14px; line-height: 1.5; min-height: 60px; }
        .btn { display: inline-block; width: 80%; padding: 10px; margin: 8px 0; background-color: #0056b3; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; }
        .btn:hover { background-color: #004085; }
        .btn-alt { background-color: #28a745; }
        .btn-alt:hover { background-color: #218838; }
        .footer { text-align: center; color: #777; font-size: 14px; margin-top: 40px; padding: 20px; }
        /* --- Upgraded Footer Style --- */
        .main-footer { 
            background-color: #1a252f; 
            color: #ecf0f1; 
            padding: 40px 20px 20px 20px; 
            margin-top: 60px; 
            font-size: 14px; 
            text-align: left;
        }
        .footer-container { 
            display: flex; 
            justify-content: space-between; 
            max-width: 1100px; 
            margin: 0 auto; 
            flex-wrap: wrap; 
            gap: 30px;
        }
        .footer-col { 
            flex: 1; 
            min-width: 220px; 
        }
        .footer-col h4 { 
            color: #3498db; 
            margin-top: 0; 
            margin-bottom: 15px; 
            font-size: 16px; 
            border-bottom: 2px solid #3498db; 
            padding-bottom: 5px; 
            display: inline-block;
        }
        .footer-col p { 
            color: #bdc3c7; 
            line-height: 1.6; 
            margin: 0;
        }
        .footer-col ul { 
            list-style: none; 
            padding: 0; 
            margin: 0; 
        }
        .footer-col ul li { 
            margin-bottom: 10px; 
        }
        .footer-col ul li a { 
            color: #bdc3c7; 
            text-decoration: none; 
            transition: color 0.2s; 
        }
        .footer-col ul li a:hover { 
            color: #3498db; 
        }
        .footer-bottom { 
            text-align: center; 
            margin-top: 40px; 
            padding-top: 20px; 
            border-top: 1px solid #2c3e50; 
            color: #7f8c8d; 
            font-size: 13px; 
        }
    </style>
</head>
<body>

<div class="header">
    <h1>CARE Group Medical Portal</h1>
    <p>Find Specialists & Book Online Appointments Easily</p>
</div>

<div class="main-container">
    <div class="welcome-box">
        <h2>Welcome to CARE e-Project System</h2>
        <p>Please select your portal option below to proceed with registration or login access.</p>
    </div>

    <div class="grid-container">
        <div class="card">
            <h3>Patient Portal</h3>
            <p>Search for certified specialist doctors in your surrounding cities and book appointments online instantly.</p>
            <a href="register.php" class="btn">Register as Patient</a>
            <a href="login.php" class="btn btn-alt">Patient Login</a>
        </div>

        <div class="card">
            <h3>Doctor Portal</h3>
            <p>Join our medical network, manage your profile visibility, specialized areas, and check patient appointment track records.</p>
            <a href="register_doctor.php" class="btn">Register as Doctor</a>
            <a href="login.php" class="btn btn-alt">Doctor Login</a>
        </div>
    </div>
</div>

<div class="footer">
    &copy; <?= date('Y') ?> CARE Medical Services Group. All Rights Reserved.
</div>

<footer class="main-footer">
    <div class="footer-container">
        
        <div class="footer-col">
            <h4>CARE Group</h4>
            <p>Providing synchronous eProject healthcare solutions across Pakistan[cite: 7, 24]. Search for qualified specialist doctors in your surrounding cities and schedule your checkups effortlessly[cite: 24, 25].</p>
        </div>

        <div class="footer-col">
            <h4>Medical Insight</h4>
            <ul>
                <li><a href="#">Diseases & Preventions [cite: 27]</a></li>
                <li><a href="#">Cures & Medical Guide [cite: 27]</a></li>
                <li><a href="#">Latest Medical Inventions [cite: 28]</a></li>
                <li><a href="#">Global Medical News [cite: 28]</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Access Portals</h4>
            <ul>
                <li><a href="login.php">Patient Dashboard </a></li>
                <li><a href="login.php">Doctor Channel </a></li>
                <li><a href="login.php">Administrative Portal </a></li>
                <li><a href="index.php">Main Home Portal</a></li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        &copy; <?= date('Y') ?> CARE Medical Services Group. Built for Aptech eProject Evaluation[cite: 7, 24]. All Rights Reserved.
    </div>
</footer>

</body>
</html>