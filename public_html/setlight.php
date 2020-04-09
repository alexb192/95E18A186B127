<?php
require_once('common.php');

$db = new DBUser();

// sets theme to light in tickets table
$db->set_settings($_SESSION['is-logged-in'], TRUE);
?>