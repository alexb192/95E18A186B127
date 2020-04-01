<?php
require_once('common.php');
?>
<!DOCTYPE html>
<html>
<body>
<?php if (!UserUtils::is_logged_in()) { ?>
  <?php header("masterpage.html");
  exit()
  ?>
<?php } else { ?>
  <?php header("login.php");
  exit()
  ?>
<?php } ?>
</body>
</html>
