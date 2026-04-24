<?php
$uploadDir = "uploads/";

// Create folder if not exists
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Handle upload
$message = "";
if (isset($_POST['submit'])) {
    $fileName = basename($_FILES["file"]["name"]);
    $targetFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        $message = "File uploaded successfully!";
    } else {
        $message = "Error uploading file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Single File Uploader</title>

<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f4f4;
}

.container {
    width: 400px;
    margin: 50px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
}

input[type="file"] {
    margin: 10px 0;
}

button {
    padding: 10px 20px;
    background: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
}

button:hover {
    background: #0056b3;
}

.files {
    margin-top: 20px;
    text-align: left;
}

.files a {
    display: block;
    margin: 5px 0;
    color: #333;
}
.msg {
    color: green;
}
.error {
    color: red;
}
</style>

</head>
<body>

<div class="container">
    <h2>Upload Any File</h2>

    <?php if ($message): ?>
        <p class="msg"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <br>
        <button type="submit" name="submit">Upload</button>
    </form>

    <div class="files">
        <h3>Uploaded Files</h3>

        <?php
        if (is_dir($uploadDir)) {
            $files = scandir($uploadDir);

            foreach ($files as $file) {
                if ($file != "." && $file != "..") {
                    echo "<a href='$uploadDir$file' target='_blank'>$file</a>";
                }
            }
        }
        ?>
    </div>
</div>

</body>
</html>