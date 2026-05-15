<?php
$filename = "example.txt";

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "files"; 

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_text = $_POST['user_text'] ?? '';

    if (!empty(trim($user_text))) {
        $stmt = $conn->prepare("INSERT INTO submissions (content) VALUES (?)");
        
        if ($stmt) {
            $stmt->bind_param("s", $user_text);
            
            if ($stmt->execute()) {
                $file_w = fopen($filename , "a+");
                fwrite($file_w, $user_text . PHP_EOL);
                fclose($file_w);
                
                $message = "Data successfully saved to database and file!";
            } else {
                $message = "Execution failed: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $message = "SQL Prepare failed: " . $conn->error . ". Please check if the 'submissions' table and 'content' column exist.";
        }
    } else {
        $message = "Please enter some text before submitting.";
    }
}

$file_content = "";
if (file_exists($filename) && filesize($filename) > 0) {
    $file = fopen($filename , "r+");
    $length = filesize($filename);
    $file_content = fread($file, $length);
    fclose($file);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Viewer & SQL Logger</title>
    <style>
        :root {
            --bg-color: #f4f7f6;
            --card-bg: #ffffff;
            --text-color: #333333;
            --accent-color: #4f46e5;
            --accent-hover: #4338ca;
            --border-color: #e5e7eb;
            --alert-bg: #f0fdf4;
            --alert-text: #166534;
        }

        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: var(--card-bg);
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            max-width: 600px;
            width: 90%;
            border: 1px solid var(--border-color);
            margin: 2rem 0;
        }

        h2 {
            margin-top: 0;
            color: #111827;
            font-size: 1.5rem;
            font-weight: 600;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 0.75rem;
        }

        .alert {
            background-color: var(--alert-bg);
            color: var(--alert-text);
            padding: 0.75rem 1rem;
            border-radius: 6px;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #374151;
        }

        textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-family: inherit;
            font-size: 1rem;
            resize: vertical;
            box-sizing: border-box;
        }

        textarea:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .btn {
            display: inline-block;
            background-color: var(--accent-color);
            color: #ffffff;
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.2s ease, transform 0.1s ease;
            text-align: center;
        }

        .btn:hover {
            background-color: var(--accent-hover);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--accent-color);
            border: 1px solid var(--accent-color);
            margin-left: 0.5rem;
        }

        .btn-secondary:hover {
            background-color: #f5f3ff;
        }

        .file-preview {
            background-color: #f9fafb;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 1.25rem;
            margin: 1.5rem 0;
            font-size: 1rem;
            line-height: 1.6;
            color: #4b5563;
            white-space: pre-wrap;
            max-height: 200px;
            overflow-y: auto;
        }

        .actions {
            margin-top: 1.5rem;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Submit Data</h2>
    
    <?php if (!empty($message)): ?>
        <?php 
            $is_error = (strpos($message, 'failed') !== false || strpos($message, 'Error') !== false || strpos($message, 'Please') !== false);
            $bg_style = $is_error ? 'background-color: #fef2f2; color: #991b1b;' : '';
        ?>
        <div class="alert" style="<?php echo $bg_style; ?>"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label Lothar for="user_text">Enter Text to Store:</label>
            <textarea id="user_text" name="user_text" rows="4" required placeholder="Type something here..."></textarea>
        </div>
        <button type="submit" class="btn">Submit Entry</button>
    </form>

    <h2 style="margin-top: 2.5rem;">File Content Preview</h2>
    
    <div class="file-preview">
        <?php echo !empty($file_content) ? htmlspecialchars($file_content) : "File is empty or does not exist yet."; ?>
    </div>

    <div class="actions">
        <a href="<?php echo $filename;?>" download class="btn btn-secondary">
            Download File
        </a>
    </div>
</div>

</body>
</html>