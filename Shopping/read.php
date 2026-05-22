<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Users Data</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<center>
<a href="insert.php" class="btn btn-primary mb-3">
Create User
</a>
</center>

<center>
<a href="welcome.php" class="btn btn-primary mb-3">
Return to dashboard
</a>
</center>

<table class="table table-bordered table-striped">

<tr>
<th>ID</th>
<th>Username</th>
<th>Email</th>
<th>Password</th>
<th>Action</th>
</tr>

<?php

include("db.php");

$query="SELECT * FROM users";

$queryRun=mysqli_query($conn,$query);

$count=1;

while($fetch=mysqli_fetch_assoc($queryRun))
{
?>

<tr>

<td><?php echo $count; ?></td>

<td><?php echo $fetch['username']; ?></td>

<td><?php echo $fetch['email']; ?></td>

<td><?php echo $fetch['password']; ?></td>

<td>

<a class="btn btn-primary"
href="edit.php?id=<?php echo $fetch['id']; ?>">
Edit
</a>

<a class="btn btn-danger"
href="delete.php?id=<?php echo $fetch['id']; ?>">
Delete
</a>

</td>

</tr>

<?php
$count++;
}
?>

</table>

</div>

</body>
</html>