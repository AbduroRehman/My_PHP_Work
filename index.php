<H1>Short hand if</H1>

<?php

$user = "ali";
$pass = "123";

$result = $user == "abdur" && $pass == "123" ? "Login" : "invalid username or password";

echo "<h2> $result </h2>";

?>

<h1>Switch case</h1>

<?php

$num1 = 2;

$num2 = 10;

$opt = "/";

$output = "";


switch($opt){

case "+";
    $output = $num1+$num2;
break;

case "-";
    $output = $num1-$num2;
break;

case "*";
    $output = $num1*$num2;
break;

case "/";
    if($num1 == 0 && $num2 == 0){

    $output = "Result is undefined";
    }
    else if ($num2 == 0){
        $output = "Cannot divide by zero";
    }
    else{
        $output = $num1/$num2;
    }
break;

default:

echo "Invalid operator";

}

echo "<h4>Number 1 : $num1 , Number 2 : $num2 , Operator : $opt <br> Result : $output</h4>";


?>