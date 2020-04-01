<?php
require_once('common.php');
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="loginpage.css" />

<html>
  <head>
    <title>Landing Page</title>
  </head>

  <body>
    <div>
      <form action="processlogin.php" method="post">
        <b>Username:</b> <input type="text" name="uname" /><br />
        <b>Password:</b> <input type="password" name="pass" /><br />
        <input class="submitbutton" type="submit" value="Log In" />
        <button>Continue as Guest</button>
      </form>
    </div>
  </body>
</html>