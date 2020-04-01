<?php
require_once('common.php');
?>
<!DOCTYPE html>
<html>
<body>
<h1>Demonstrations</h2>
<p>Please this directory into a public_html directory and check out:</p>
<ul>
<?php if (!UserUtils::is_logged_in()) { ?>
  <li><a href="login.php">Log in</a></li>
<?php } else { ?>
  <li><a href="logout.php">Log out</a></li>
<?php } ?>
  <li>FOR TESTING: <a href="login.php">login</a></li>
  <li>FOR TESTING: <a href="logout.php">logout</a></li>
  <li>FOR TESTING: <a href="processlogin.php">processlogin</a></li>
  <li>FOR TESTING: <a href="private.php">private</a></li>
  <li>Read and run file download: <a href="demo-file-download.php">demo-file-download</a></li>
  <li>Look at demo-file-lock.php</li>
  <li>Edit config.php with DB information</li>
  <li>Read and run create user table: <a href="demo-userdb-create.php">demo-userdb-create</a></li>
  <li>Read and run user usage demo: <a href="demo-userdb-usage-demo.php">demo-userdb-usage-demo</a></li>
  <li>Read and run destroy user table: <a href="demo-userdb-destroy.php">demo-userdb-destroy</a></li>
  <li>Look at common.php, classes/*, and lib/*.</li>
</body>
</html>
