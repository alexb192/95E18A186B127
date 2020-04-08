<?php
require_once('common.php');

$db = new DBUser();

$db->set_settings($_SESSION['is-logged-in'], TRUE);
?>