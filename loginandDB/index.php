<?php
require_once('common.php');
?>
<!DOCTYPE html>
<html>
<body>
<?php if (!UserUtils::is_logged_in()) { ?>
  <?php header("Location: mainPage.php");
  //exit()
  ?>
<?php } else { ?>
  <?php header("Location: mainPage.php");
  //exit()
  ?>
<?php } ?>

<!-- index simply for redirecting -->


</body>
</html>
