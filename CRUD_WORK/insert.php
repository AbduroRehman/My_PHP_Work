<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add User Form</title>

  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
  >

  <style>
    body{
      background-color: #f4f4f4;
    }

    .form-container{
      max-width: 600px;
      margin: 50px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="form-container">

      <h2 class="text-center mb-4">Add User</h2>

     


      <form method="post">

        <div class="mb-3">
          <label class="form-label">Enter Your Name</label>
          <input 
            type="text" 
            class="form-control" 
            placeholder="Enter your name"
            name="name"
            required
          >
        </div>

        <div class="mb-3">
          <label class="form-label">Enter Your Phone</label>
          <input 
            type="tel" 
            class="form-control" 
            placeholder="Enter your phone"
            name="phone"
            required
          >
        </div>

        <div class="mb-3">
          <label class="form-label">Enter Your Email</label>
          <input 
            type="email" 
            class="form-control" 
            placeholder="Enter your email"
            name="email"
            required
          >
        </div>

        <div class="mb-3">
          <label class="form-label">Enter Your Address</label>
          <textarea 
            class="form-control" 
            rows="3"
            placeholder="Enter your address"
            name="address"
            required
          ></textarea>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">
            Save User
          </button>
        </div>

      </form>

      <br>
      <br>

       <a href="read.php" class="btn btn-primary">view users</a>

    </div>
  </div>

</body>
</html>

<?php

include("db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $checkRun = mysqli_query($con, $checkEmail);

    if(mysqli_num_rows($checkRun) > 0){

        echo "
        <script>
            alert('Email already exists in database');
        </script>
        ";

    } else {

        $query = "INSERT INTO users(name, phone, email, address) 
                  VALUES ('$name','$phone','$email','$address')";

        $queryRun = mysqli_query($con, $query);

        if($queryRun){

            echo "
            <script>
                alert('User inserted successfully');
            </script>
            ";

        } else {

            echo "Error: " . mysqli_error($con);
        }
    }
}

?>