<?php
require_once('common.php');

//header('ContentType: text/plain');
//print_r($_POST);

$VALID_REDIRECT='mainPage.php';
$VALID_ADMIN_REDIRECT = 'adminpage.php';
$INVALID_REDIRECT='login.php';
$REDIRECT=$INVALID_REDIRECT;
// session variable to track invalid login
$x = 'var1';
$_SESSION['var'] = $x;

// check if the POST array format is as expected...
if (count($_POST) == 2 
  && array_key_exists('uname', $_POST)
  && array_key_exists('pass', $_POST))
{

  // stripping html tags to prevent html injection attacks
  $uname = strip_tags($_POST['uname']);
  $pass = strip_tags($_POST['pass']);
  
  // check if the user has a valid password
  $db = new DBUser();
  if ($db->check_user_pass($uname, $pass))
  {
    // valid login
    UserUtils::log_in_user($uname);
    $x = FALSE;
    
    // redirect if the user is admin
    if ($db->check_admin($uname))
    {
      UserUtils::log_in_admin($uname);
      $REDIRECT=$VALID_ADMIN_REDIRECT;
    }
    // redirect if user is not admin
    else 
    {
      $REDIRECT=$VALID_REDIRECT; 
    }  
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

// redirect the user to an appropriate page...
HTTPUtils::redirect($REDIRECT);
?>

