<?php

include("db.php");

$id = $_GET["id"];

// delete query
$query = "DELETE FROM users WHERE id='$id'";

$queryRun = mysqli_query($conn,$query);

if($queryRun){

header("Location: read.php");

}else{

echo "Delete Failed: " . mysqli_error($conn);

}

?>