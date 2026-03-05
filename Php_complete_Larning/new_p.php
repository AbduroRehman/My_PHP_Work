<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>if else statement</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .containner {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        h1 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .status-box {
            margin-top: 20px;
            padding: 15px;
            border-radius: 8px;
            font-weight: bold;
            background-color: #e2e8f0;
        }
    </style>
</head>

<body>
    <div class="containner">
        <h1>Learning PHP</h1>

        <div class="status-box">
            <?php
            $age = 15;

            if ($age >= 18) {
                echo "You are Allowed";
            } else if ($age == 15) {
                echo "Benzima is coming get lost";
            } else {
                echo "You are Minor";
            };


            echo "<br>";
            echo "<br>";


            $languages = array("Python", "Javascript", "node.js", "React js", "php");

            echo $languages[0];

             echo "<br>";

             echo count($languages);

            echo "<br>";
            echo "<br>";

            $a = 1;

            while ($a <= 10) {
                echo "<br>";
                echo "Hi I am While Loop";
                

                echo $a;

                $a++;
            }

            echo "<br>";
            echo "<br>";


            // While Loop

            $x = 0;

            while ($x < count($languages)) {
                echo "<br>";

                echo "The Value of languages is ";

                echo $languages[$x];

                $x++;
            }

            echo "<br>";
            echo "<br>";

            // Do While Loop

           $y = 0;
            
            do {
                 echo "<br>";
                echo "Hi I am While Loop";
                

                echo $y;

                $y++;
            } while ($y <= 10);

            // For Loop

            for ($i=0; $i < 11; $i++) { 
                echo "<br>";
                
                echo "The Vlue of I in for Loop is";

                echo $i;
            }

            // Foreach Loop

            echo "<br>";
            echo "<br>";

           foreach($languages as $values){
            echo "<br>The Value of for each loop is <nbsp> ";

            echo $values;

           }

        echo "<br>";
        echo "<br>";

         // Functions in php

         function name(){
            echo "ABDUR";
         }

       name();

        echo "<br>";
        echo "<br>";

        function choice($num , $num1){
            echo "Your Answer is" ;
            echo $num + $num1;
        }

        choice(12 , 3);




            ?>
        </div>
    </div>
</body>

</html>