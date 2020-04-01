<?php
require_once('common.php');

// Clearly this is a very crude interface.
// A normal web site would never output raw text. Instead an admin login
// would trigger this and only would output errors if they occured.
// Ensure that:
//   $CFG->db_admin_prohibit_create_drop = FALSE;
// is set in config.php.
header('Content-Type: text/plain');
try
{
  echo "Destroying users DB...\n";
  $db = new DBUser();
  $db->admin_destroy_all_structures();
  echo "Finished destroying DB.\n";
}
catch (Exception $e)
{
  echo "EXCEPTION: ".$e->getMessage();
}
?>
