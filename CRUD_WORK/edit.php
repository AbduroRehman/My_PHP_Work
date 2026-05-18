<?php
$id = $_GET["id"];
echo "User ID: ".$id;

include("db.php");

$query = "SELECT * from users where id = $id";
$queryRun = mysqli_query($con , $query);


$fetch = mysqli_fetch_assoc($queryRun);


?>

<link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
  >

<div class="container">
<a href="read.php" class="btn btn-primary">Back</a>
<h1>Edit User</h1>
<form method="post">

<label for="">
    Enter your Name
    <input type="text" name="name" value"<?php echo $fetch["name"] ?>">
</label>
<br>
<br>

<label for="">
    Enter your phone
    <input type="number" name="phone" value"<?php echo $fetch["phone"] ?>">
</label>
<br>
<br>

<label for="">
    Enter your email
    <input type="email" name="email" value"<?php echo $fetch["email"] ?>">
</label>
<br>
<br>

<label for="">
    Enter your Address
    <input type="address" name="address" value"<?php echo $fetch["address"] ?>">
</label>
<br>
<br>
<div class="d-grid gap-2">
          <button type="submit" class="btn btn-success">Update User</button>
          <a href="read.php" class="btn btn-secondary">Cancel</a>
        </div>

</form>

</div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    
    $update = "UPDATE users set 
    name = '$name'
    phone = '$phone'
    email = '$email'
    address = '$address'

    where id = $id
    
    
    ";


    $updateRun = mysqli_query($con , $update);

    echo "<script>alert('Data updated successfully')</script>";

    echo "
    <script>
    window.location.href = 'read.php';
    </script>
    ";
    
    
    
    
    }

?>