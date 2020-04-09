<?php
require_once('common.php');

$db = new DBUser();

// sets theme to dark in tickets table
$db->set_settings($_SESSION['is-logged-in'], FALSE);
?>