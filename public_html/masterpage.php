<?php
require_once('common.php');
include './masterpage_cookiecheck.php';
?>
<!-- This is a masterpage that includes nav bar and a footer used on every page of the site -->
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
        <li id="navbarli" class="navbarli"><a href="mainPage.php">HOME</a></li>
        <li id="navbarli" class="navbarli">
          <a href="viewcalendar.php">VIEW CALENDAR</a>
        </li>
        <li id="navbarli" class="navbarli"><a href="settings.php">SETTINGS</a></li>
        <?php if (!UserUtils::is_logged_in()) { ?>
        <li id="navbarli" class="navbarli"><a href="login.php">LOG IN</a></li>
        <?php } else { ?>
        <?php if (UserUtils::is_admin()) { ?>
        <li id="navbarli" class="navbarli"><a href="adminpage.php">ADMIN HUB</a></li>
        <?php } ?>
        <li id="navbarli" class="navbarli"><a href="logout.php">LOG OUT</a></li>
        <?php }?>
      </ul>
    </nav>
  </div>

  <body></body>

  <div>
    <footer id="footer">
      <nav>
        <ul class="footeritems">
          <li>CS-3340 Group Project</li>
          <?php if (UserUtils::is_admin()) { ?>
            <li><a href="viewtickets.php">View Tickets</a></li>
          <?php } else { ?>
            <li><a href="contactus.php">Contact Us</a></li>
          <?php } ?>
        </ul>
      </nav>
    </footer>
  </div>
</html>
