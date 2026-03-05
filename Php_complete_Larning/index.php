<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Practice</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php

    Define("Py" , 69.9);

    // basic syntax

    echo "<h1>basic syntax</h1>";

    echo "<br>";

    echo "Hello From php";

    echo "<br>";
    echo "<br>";

    echo "<hr>";

    // Variables

    echo "<h1>Variables</h1>";

    $variable1 = 5;
    $variable2 = 2;
    echo "<br>";
    
    $color = "Red";
    $outfit = "Shorts and shirts";
    
    echo "My Car color is $color";

    echo "<br>";
    echo "<br>";

    echo "I like to wear $outfit";

    echo "<br>";
    echo "<br>";

    echo "<hr>";

    // Arithematic Operators

    echo "<h1>Arithematic Operators</h1>";

    echo "The value of Var1 and Var2 is ";
    echo $variable1 + $variable2;
    echo "<br>";
    echo "<br>";
    echo "The value in minus of Var1 and Var2 is ";
    echo $variable1 - $variable2;
    echo "<br>";
    echo "<br>";
    echo "The value in multiply of Var1 and Var2 is ";
    echo $variable1 * $variable2;
    echo "<br>";
    echo "<br>";
    echo "The value in divide of Var1 and Var2 is ";
    echo $variable1 / $variable2;

    echo "<hr>";

    // Assign Operators

    echo "<h1>Assign Operators</h1>";


    echo "<br>";
    echo "<br>";

    $New_V = $variable1;

    $New_V /= 5 ;

    echo "The value of new Variable is <nbsp>";
    echo $New_V;

    echo "<br>";

    echo "<hr>";

    // Comparision Operators

    echo "<h1>Comparision Operators</h1>";

    echo "<br>";
    echo "<br>";

    echo "The Value of 1==4 is <nbsp>";

    echo var_dump(1 == 4);

    echo "<br>";
    echo "<br>";

    echo "The Value of 1!=4 is <nbsp>";

    echo var_dump(1 != 4);

    echo "<br>";
    echo "<br>";

    echo "The Value of 1>=4 is <nbsp>";

    echo var_dump(1 >= 4);

    echo "<br>";
    echo "<br>";

    echo "The Value of 1<=4 is <nbsp>";

    echo var_dump(1 <= 4);

    echo "<hr>";

// Increament/decreament Operators

    echo "<br>";
    echo "<br>";

    // echo $variable1++;
    // echo "<br>";
    // echo $variable1;
    // echo "<br>";

    // echo $variable1--;
    // echo "<br>";
    // echo $variable1;
    // echo "<br>";

    echo --$variable1;
    echo "<br>";
    echo $variable1;

    // echo ++$variable1;
    // echo "<br>";
    // echo $variable1;

    echo "<hr>";

// Logical Operators 

// in php Logical operators are and(&&), or(||),  xor, not(!)


    echo "<br>";
    echo "<br>";

    // And operator

    // $my_v = (false) and (True);

    // $my_v = (true) and (True);

    // $my_v = (false) and (false);

    $my_v = (true) and (false);

    echo var_dump($my_v);

    echo "<br>";
    echo "<br>";

    // or operator

    $new_o = (true or false);

    $new_o = (false or True);

    $new_o = (true or True);

    $new_o = (false or false);

    echo var_dump($new_o);

    // xor operator

    echo "<br>";
    echo "<br>";

    $Xor_1 = (True xor false);

    $Xor_1 = (false xor True);

    $Xor_1 = (true xor True);

    $Xor_1 = (false xor false);

    echo var_dump($Xor_1);

    // ! operator


    echo "<br>";
    echo "<br>";

    echo var_dump(!true);
    echo "<br>";
    echo var_dump(!false);

    echo "<hr>";

    // Data Types in php

    echo "<br>";
    echo "<br>";

    $string = "i am a string";

    echo var_dump($string);

    echo "<br>";

    $integer = 67;

    echo var_dump($integer);

    echo "<br>";

    $float = 67.7;

    echo var_dump($float);

    echo "<br>";

     $boolean = true;

    echo var_dump($boolean);

    echo "<br>";

    echo (Py);














    
    ?>

</body>
</html>

<?php

    echo "<hr>";

echo "<br>";
echo "<br>";


$hello = "Abdur";
$hello2 = "Rehman";

print_r($hello . " " . $hello2);



?>