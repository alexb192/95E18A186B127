<?php
require_once('common.php');

//header('ContentType: text/plain');
//print_r($_POST);

$VALID_REDIRECT='mainPage.php';
$VALID_ADMIN_REDIRECT = 'private.php';
$INVALID_REDIRECT='login.php';
$REDIRECT=$INVALID_REDIRECT;
$x = 'var1';
$_SESSION['var'] = $x;


// check if the POST array format is as expected...
if (count($_POST) == 2 
  && array_key_exists('uname', $_POST)
  && array_key_exists('pass', $_POST))
{
  // check if the user has a valid password
  $db = new DBUser();
  if ($db->check_user_pass($_POST['uname'], $_POST['pass']))
  {
    // valid login
    UserUtils::log_in_user($_POST['uname']);
    $x = FALSE;
    $REDIRECT=$VALID_ADMIN_REDIRECT;

    // if ($db->check_admin($_POST['uname']))
    // {
    //   $REDIRECT=$VALID_ADMIN_REDIRECT;
    // }
    // else 
    // {
    //   $REDIRECT=$VALID_REDIRECT; 
    // }  
  }
  else
  {
    // invalid login
    $x = TRUE;
    UserUtils::log_out_user();
  }
}
else
{
  // invalid POST
  $x = TRUE;
  UserUtils::log_out_user();
}

DBUser::check_admin("admin"); // testing check_admin function

// redirect the user to an appropriate page...
HTTPUtils::redirect($REDIRECT);



?>

