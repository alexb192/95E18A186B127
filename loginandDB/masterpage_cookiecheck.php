<?php

$styleChoice = "";
if (!isset($_COOKIE['sitestyle'])){
    $styleChoice = "dark";
} else {
    $styleChoice = $_COOKIE['sitestyle'];
}

?>