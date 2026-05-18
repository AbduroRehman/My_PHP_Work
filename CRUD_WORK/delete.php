<?php
include("db.php");

$id = $_GET["id"];
echo $id;

$query = "DELETE from users where id = $id ";
$queryRun = mysqli_query($con , $query);


header("Location:read.php");
?>