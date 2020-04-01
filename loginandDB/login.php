<?php
require_once('common.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h1>Login Form</h1>
  <form action="processlogin.php" method="post">
    <b>Username:</b> <input type="text" name="uname" /><br />
    <b>Password:</b> <input type="password" name="pass" /><br/>
    <input type="submit" />
  </form>
</body>
</html>
