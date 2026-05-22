<?php

include("db.php");

$id = $_GET["id"];

// user fetch
$query = "SELECT * FROM users WHERE id='$id'";
$queryRun = mysqli_query($conn,$query);

$fetch = mysqli_fetch_assoc($queryRun);


// update data
if($_SERVER["REQUEST_METHOD"]=="POST")
{

$username=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["password"];

// password hash
$hashPassword=password_hash(
$password,
PASSWORD_DEFAULT
);

$update="
UPDATE users SET

username='$username',
email='$email',
password='$hashPassword'

WHERE id='$id'
";

$updateRun=mysqli_query($conn,$update);

if($updateRun){

echo "
<script>
alert('Data Updated Successfully');
window.location='read.php';
</script>
";

}else{

echo mysqli_error($conn);

}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Edit User</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<a href="read.php"
class="btn btn-primary">
Back
</a>

<h2 class="mt-3">
Edit User
</h2>

<form method="POST">

<div class="mb-3">

<label>
Username
</label>

<input
type="text"
class="form-control"
name="username"
value="<?php echo $fetch['username']; ?>"
required>

</div>


<div class="mb-3">

<label>
Email
</label>

<input
type="email"
class="form-control"
name="email"
value="<?php echo $fetch['email']; ?>"
required>

</div>


<div class="mb-3">

<label>
Password
</label>

<input
type="text"
class="form-control"
name="password"
placeholder="Enter new password"
required>

</div>


<button
class="btn btn-success">
Update User
</button>

<a
href="read.php"
class="btn btn-secondary">
Cancel
</a>

</form>

</div>

</body>
</html>