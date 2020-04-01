<?php
require_once('common.php');
?>
<!DOCTYPE html>
<html>
<body>
<?php if (!UserUtils::is_logged_in()) { ?>
  <?php header("Location: masterpage.php");
  //exit()
  ?>
<?php } else { ?>
  <?php header("Location: masterpage.php");
  //exit()
  ?>
<?php } ?>




</body>
</html>
