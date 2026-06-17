<?php
echo"Oop practice";


class Car{
    public $name;
    public $color;

    public function __construct($p1 , $p2){
        $this->name = $p1;
        $this->color = $p2;
    }

    public function Output(){
        return "<p>Car Name: $this->name Car Color: $this->color</p>";
    }

    public function __destruct(){
        echo"Object has been finished";
    }
}

$car1 = new Car("civic" , "white");
echo $car1->Output();

$car2 = new Car("mujahid truck" , "black");
echo $car2->Output();

?>