<?php
class Animal{
    protected $name;
    protected $legs=4;
    protected $cold_blooded="no";
    public function __construct($value) {
        $this->name=$value;
    }
    public function get_name(){
        echo ("Name : ".$this->name);
        echo ("<br>"); 
    }
    public function get_legs(){
        echo ("Legs : ".$this->legs);
        echo ("<br>"); 
    }
    public function get_cold_blooded(){
        echo ("Cold Blooded : ".$this->cold_blooded );
        echo ("<br>");
    }
};
?>