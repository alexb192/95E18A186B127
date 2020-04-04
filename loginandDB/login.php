<?php
require_once('common.php');
$content = "This is the page content";
include('masterpage.php');
$y =  $_SESSION['var'];
?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="loginpage.css" />

<html>
  <head>
    <title>Login</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src='./loginpage.js'></script>
  </head>

  <body>
    <div class="container">
     
      <form action="processlogin.php" method="post">
        <b>Username:</b> <input type="text" oninvalid="alert('You must enter a username!');" required name="uname" required/><br />
        <b>Password:</b> <input type="password" oninvalid="alert('You must enter a password!');" required name="pass" required/><br />
         <input class="submitbutton" type="submit" value="Log In" /> <!-- onclick= "return invalidPrompt($y)" /> -->
        
        <?php InvalidLogin::onPasswordFail($y);?> 
        

      </form>   
    </div>
  </body>
</html>

