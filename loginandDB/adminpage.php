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
<body>
<h1>Administrator Hub</h1>
<img 
  src="./images/admin.png" 
  alt="Admin Image" />
<br />
<button onclick="window.location.href = 'createDB.php' ">Database Tools</button>
<button onclick="window.location.href = '' ">View Tickets</button>
<br />
</body>
</html>
