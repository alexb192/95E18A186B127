<?php

$db = new DBUser();

$styleChoice = "";
if(UserUtils::is_logged_in()){
    if($db->check_settings($_SESSION['is-logged-in']))
    {
        $styleChoice = "light";
    }
    else
    {
        $styleChoice = "dark";
    }
}
else
{
    if (!isset($_COOKIE['sitestyle'])){
        $styleChoice = "dark";
    } else {
        $styleChoice = $_COOKIE['sitestyle'];
    }
}
?>