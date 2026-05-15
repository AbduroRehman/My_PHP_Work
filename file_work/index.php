<?php
$filename = "example.txt";

$file_w = fopen($filename , "a+");
fwrite($file_w , "A paragraph is a self-contained unit of writing, consisting of one or more sentences that develop a single, central idea or topic. It acts as a building block of prose, typically comprising a topic sentence, supporting sentences, and a concluding.");
fclose($file_w);

$file = fopen($filename , "r+");
$length = filesize($filename);
$file_content = fread($file, $length);
fclose($file);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Viewer & Downloader</title>
    <style>
        :root {
            --bg-color: #f4f7f6;
            --card-bg: #ffffff;
            --text-color: #333333;
            --accent-color: #4f46e5;
            --accent-hover: #4338ca;
            --border-color: #e5e7eb;
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
        }

        h2 {
            margin-top: 0;
            color: #111827;
            font-size: 1.5rem;
            font-weight: 600;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 0.75rem;
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
        }

        .btn-download {
            display: inline-block;
            background-color: var(--accent-color);
            color: #ffffff;
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            font-weight: 500;
            transition: background-color 0.2s ease, transform 0.1s ease;
            text-align: center;
            box-shadow: 0 4px 6px rgba(79, 70, 229, 0.15);
        }

        .btn-download:hover {
            background-color: var(--accent-hover);
            transform: translateY(-1px);
        }

        .btn-download:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>File Content Preview</h2>
    
    <div class="file-preview">
        <?php echo htmlspecialchars($file_content); ?>
    </div>

    <a href="<?php echo $filename;?>" download class="btn-download">
        Download File
    </a>
</div>

</body>
</html>