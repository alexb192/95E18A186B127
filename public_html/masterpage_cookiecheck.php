<?php

// sets cookie for the theme
// $stylechoce holds this setting
$db = new DBUser();

$styleChoice = "";
// for logged in users 
// check_settings function in our DB to see if the current logged in user
// has their theme set to light or dark
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
// for non-logged in users, just sets via cookies alone
else
{
    if (!isset($_COOKIE['sitestyle'])){
        $styleChoice = "dark";
    } else {
        $styleChoice = $_COOKIE['sitestyle'];
    }
}
?>