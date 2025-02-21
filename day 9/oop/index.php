
<?php
    require_once("animal.php");
    require_once("frog.php");
    require_once("ape.php");
    $sheep = new Animal("shaun");
    $sheep->get_name();
    $sheep->get_legs();
    $sheep->get_cold_blooded();
    echo ("<br>");
    $kodok = new Frog("buduk");
    $kodok->get_name();
    $kodok->get_legs();
    $kodok->get_cold_blooded();
    $kodok->jump() ; 
    echo ("<br>");
    $sungokong = new ape("kera sakti");
    $sungokong->get_name();
    $sungokong->get_legs();
    $sungokong->get_cold_blooded();
    $sungokong->yell() ; 
?>