<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "cool_data";

$connection = mysqli_connect($db_server , $db_username , $db_password , $db_name) ;

if(!$connection){
    echo "Connection failed";
}

$name = $_POST["name"];

$email = $_POST["email"];

$phone = $_POST["phone"];

$address =  $_POST["address"];

$password = $_POST["password"];

$sql_q = "INSERT INTO `cool_users`(`Full name`, `Email`, `Phone Number`, `Address`, `Password`) VALUES ('$name','$email','$phone','$address','$password')" ; 

$result = mysqli_query($connection , $sql_q);

if($result){
    echo "Data Submitted";
}
else{
    echo "Error has Accured";
}


?>