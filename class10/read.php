<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users data</title>
    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
  >
</head>
<body>
    <section calss="container">

   <center><a href="insert.php" class="btn btn-primary">Create User</a></center> 

    <table class="table table-primary table-striprd">
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Address</th>
    </tr>

    <?php
    include("db.php");
    $query = "SELECT * FROM users";
    $queryRun = mysqli_query($con , $query);
    echo mysqli_num_rows($queryRun);


    while($fetch = mysqli_fetch_assoc($queryRun)){
        echo "<tr>
            <td>".$fetch["id"]."</td>

            <td>".$fetch["name"]."</td>

            <td>".$fetch["phone"]."</td>

            <td>".$fetch["email"]."</td>

            <td>".$fetch["address"]."</td>
        
        </tr>";

    }
    
    ?>
    
    </table>
    </section>
</body>
</html>