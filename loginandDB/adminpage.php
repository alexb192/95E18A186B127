<?php
require_once('common.php');
$content = "This is the page content";
include('masterpage.php');

if (!UserUtils::is_admin())
{
  HTTPUtils::redirect('login.php');
  exit(0);
}

?>
<html>
<link rel="stylesheet" type="text/css" href="adminpage.css" />

<body>
<h1>Administrator Hub</h1>
<img 
  src="./images/admin.png" 
  alt="Admin Image" />
<br />
<button class="button" onclick="window.location.href = 'createDB.php' ">Database Tools</button>
<button class="button" onclick="window.location.href = 'viewtickets.php' ">View Tickets</button>
<br />
</body>
</html>
