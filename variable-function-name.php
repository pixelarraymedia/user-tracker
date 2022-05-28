<?php
##

$name = "username";

$$name = "john"; //assigning a value into $username variable

echo $name." is ".$$name;


class engine
{
    public $x,$y;

    private function add(){
        echo $this->x+$this->y;
    }
    private function multiply(){
        echo $this->x*$this->y;
    }

    public function callMethod($name)
    {
        $this->$name(); // here $name is passed by caller and should be one of existing method names. Then $name will be replaced with it's value, and a method with same name will be run.
    }

}

echo "<hr/>";

$obj = new engine();
$obj->x = 10;
$obj->y = 3;
$obj->callMethod('add'); // this will call add method

echo "<hr/>";
$obj->callMethod('multiply');
?>