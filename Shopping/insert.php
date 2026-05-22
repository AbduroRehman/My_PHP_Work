<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add User</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet"
>

<style>

body{
background:#f4f4f4;
}

.form-container{
max-width:600px;
margin:50px auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,.1);
}

</style>

</head>
<body>

<center>
<a href="welcome.php" class="btn btn-primary mb-3">
Return to Dashboard
</a>
</center>

<div class="container">

<div class="form-container">

<h2 class="text-center mb-4">
Add User
</h2>

<form method="POST">

<div class="mb-3">

<label class="form-label">
Username
</label>

<input
type="text"
class="form-control"
name="username"
placeholder="Enter username"
required>

</div>


<div class="mb-3">

<label class="form-label">
Email
</label>

<input
type="email"
class="form-control"
name="email"
placeholder="Enter email"
required>

</div>


<div class="mb-3">

<label class="form-label">
Password
</label>

<input
type="password"
class="form-control"
name="password"
placeholder="Enter password"
required>

</div>


<div class="d-grid">

<button
type="submit"
class="btn btn-primary">
Save User
</button>

</div>

</form>

<br>

<a href="read.php" class="btn btn-success">
View Users
</a>

</div>

</div>

</body>
</html>

<?php

include("db.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$username=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["password"];


$checkEmail="SELECT * FROM users
WHERE email='$email'";

$checkRun=mysqli_query($con,$checkEmail);

if(mysqli_num_rows($checkRun)>0){

echo "
<script>
alert('Email already exists');
</script>
";

}else{

// password hash
$hashPassword=password_hash(
$password,
PASSWORD_DEFAULT
);

$query="INSERT INTO users
(username,email,password)

VALUES
('$username','$email','$hashPassword')";

$queryRun=mysqli_query($con,$query);

if($queryRun){

echo "
<script>
alert('User inserted successfully');
window.location='read.php';
</script>
";

}else{

echo mysqli_error($con);

}

}

}

?>