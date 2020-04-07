<?php
require_once('common.php');
include('masterpage.php');

// if (!UserUtils::is_admin())
// {
//   HTTPUtils::redirect('mainPage.php');
//   exit(0);
// }
?>
<!DOCTYPE html>
<html>
<body>
<h1>Database Tools</h2>
<ul>
  <li><a href="demo-userdb-create.php">Create DB</a></li>
  <li><a href="demo-userdb-usage-demo.php">DB Usage</a></li>
  <li><a href="demo-userdb-destroy.php">Destroy DB</a></li>
</body>
</html>
