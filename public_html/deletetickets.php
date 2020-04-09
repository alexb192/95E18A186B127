<?php
require_once('common.php');

// calling the erase() function in DBTickets to erase everything in the tickets table
$dbt = new DBTickets();

$dbt->erase();
?>