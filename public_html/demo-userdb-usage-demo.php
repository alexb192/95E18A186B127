<?php
require_once('common.php');

// Clearly this is a very crude interface.
// A normal web site would never output raw text. Instead an admin login
// would trigger this and only would output errors if they occured.
// As this is normal usage, ensure that:
//   $CFG->db_admin_prohibit_create_drop = TRUE;
// is set in config.php.
header('Content-Type: text/plain');
try
{
  echo "Connecting to DB...\n";
  $db = new DBUser();
  $db->insert('user', 'user123');
  $db->insert('admin', 'admin123', 1);

  echo "Done.\n";

}
catch (Exception $e)
{
  echo "EXCEPTION: ".$e->getMessage();
}
?>
