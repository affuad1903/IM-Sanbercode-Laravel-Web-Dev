<?php
require_once("animal.php");
class ape extends Animal{
    public $yel="Auooo";
    public $legs=2;
    public function yell(){
        echo("Yell : ". $this->yel);
        echo ("<br>");
    }
    public function get_legs(){
        echo("Legs : ". $this->legs);
        echo ("<br>");
    }
}
?>