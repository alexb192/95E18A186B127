<?php
require_once('common.php');
$content = "This is the page content";
include('masterpage.php');
$y =  $_SESSION['var'];
// $y = $GET['variable1'];
?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="loginpage.css" />

<html>
  <head>
    <title>Login</title>
  </head>

  <body>
    <div class="container">
     
      <form action="processlogin.php" method="post">
        <b>Username:</b> <input type="text" oninvalid="alert('You must enter a username!');" required name="uname" required/><br />
        <b>Password:</b> <input type="password" oninvalid="alert('You must enter a password!');" required name="pass" required/><br />
        <input class="submitbutton" type="submit" value="Log In" />
        <?php InvalidLogin::onPasswordFail($y);?> 
      </form>   
    </div>
  </body>
</html>

