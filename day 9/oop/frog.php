<?php
require_once("animal.php");
class frog extends Animal{
    public $lompat="hop hop";
    public function jump(){
        echo("Jump : ". $this->lompat);
        echo ("<br>");
    }
}
?>