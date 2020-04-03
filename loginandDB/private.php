<?php
require_once('common.php');
$content = "This is the page content";
include('masterpage.php');

if (!UserUtils::is_logged_in())
{
  HTTPUtils::redirect('login.php');
  exit(0);
}

?>
<html>
<body>
<h1>custom stuff</h1>
<img 
  src="demo-file-download.php" 
  alt="dog wants to play picture" />
<br />
<a href="logout.php">Logout</a>
<br />
<!-- have something to log out with AJAX -->
</body>
</html>
