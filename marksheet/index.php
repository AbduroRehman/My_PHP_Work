<?php

echo "<h1>Marksheet</h1>";

$student_name = "Ali";
$maths = 29;
$english = 70;
$computer = 66;

$total = $maths + $english + $computer;
$percentage = $total/300*100;

$grade = "";
$color = "";


if($maths <= 33 || $english <= 33 || $computer <= 33){
    $grade = "F";
}
else{
    if($percentage >= 80){
        $grade = "A1";
    }
    else if ($percentage >= 70){
        $grade = "A";
    }
    else if ($percentage >= 60){
        $grade = "B";
    }
    else if ($percentage >= 50){
        $grade = "C";
    }
    else if ($percentage >= 40){
        $grade = "D";
    }
    else{
        $grade = "F";
    }
}


if($grade == "A1" || $grade == "A"){
    $color = "green";
}
else if($grade == "B" || $grade == "C"){
    $color = "yellow";
}
else{
    $color = "red";
}

?>

<table border="1">

<tr>
<th>Name</th>
<th>Maths</th>
<th>English</th>
<th>Computer</th>
<th>Total</th>
<th>Percentage</th>
<th>Grade</th>
</tr>

<tr>
<td><?php echo $student_name; ?></td>
<td><?php echo $maths; ?></td>
<td><?php echo $english; ?></td>
<td><?php echo $computer; ?></td>
<td><?php echo $total; ?></td>
<td><?php echo $percentage; ?></td>
<td style="background-color:<?php echo $color; ?>">
<?php echo $grade; ?>
</td>
</tr>

</table>