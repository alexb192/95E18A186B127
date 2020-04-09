<?php
// gets called to log out the logged in user
require_once('common.php');
UserUtils::log_out_user();
HTTPUtils::redirect('index.php');
?>
