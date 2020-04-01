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
  /*
  echo "Adding some users...\n";
  $db->insert('john', 'hd834h8irtj9');
  $db->insert('suzy', '284hs8d87432jf');
  echo "1. Checking john with incorrect password... ";
  echo $db->check_user_pass('john','abc123') ? 'FAIL' : 'PASS';
  echo "\n2. Checking john with correct password... ";
  echo $db->check_user_pass('john','hd834h8irtj9') ? 'PASS' : 'FAIL';
  echo "\nLookup All...\n";
  print_r($db->lookup_all());
  echo "Lookup...\n";
  print_r($db->lookup('john'));
  echo "3. Erasing john...\n";
  $db->erase('john');
  echo "Lookup All...\n";
  print_r($db->lookup_all());
  echo "4. Checking john with incorrect password... ";
  echo $db->check_user_pass('john','abc123') ? 'FAIL' : 'PASS';
  echo "\n5. Checking john with old correct password... ";
  echo $db->check_user_pass('john','hd834h8irtj9') ? 'FAIL' : 'PASS';
  echo "\n6. Erasing suzy...\n";
  $db->erase('suzy');
  echo "Done.\n";
  */

  

}
catch (Exception $e)
{
  echo "EXCEPTION: ".$e->getMessage();
}
?>
