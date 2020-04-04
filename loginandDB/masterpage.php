<?php
require_once('common.php');
include './masterpage_cookiecheck.php';
?>

<!DOCTYPE html>
<html>
  <link
    rel="stylesheet"
    type="text/css"
    href="masterpagestyle_<?php echo $styleChoice ?>.css"
  />

  <div>
    <nav>
      <ul id="navbaritems" class="navbaritems">
        <li id="navbarli" class="navbarli"><a href="mainPage.php">Home</a></li>
        <li id="navbarli" class="navbarli">
          <a href="viewcalendar.php">View Calendar</a>
        </li>
        <li id="navbarli" class="navbarli"><a href="settings.php">Settings</a></li>
        <?php if (!UserUtils::is_logged_in()) { ?>
        <li id="navbarli" class="navbarli"><a href="login.php?variable1=FALSE">Log In</a></li>
        <?php } else { ?>
        <li id="navbarli" class="navbarli"><a href="logout.php">Log Out</a></li>
        <?php } ?>
      </ul>
    </nav>
  </div>

  <body></body>

  <div>
    <footer id="footer">
      <nav>
        <ul class="footeritems">
          <li>CS-3340 Group Project</li>
          <li><a href="contactus.php">Contact Us</a></li>
        </ul>
      </nav>
    </footer>
  </div>
</html>
