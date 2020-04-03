<?php
require_once('common.php');
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="masterpagestyle.css" />



<div>
  <nav>
    <ul class="navbaritems">
      <li class="navbarli"><a href="mainPage.php">Home</a></li>
      <li class="navbarli"><a href="viewcalendar.php">View Calendar</a></li>
      <li class="navbarli"><a href="">Settings</a></li>
      <?php if (!UserUtils::is_logged_in()) { ?>
  <li class="navbarli"><a href="login.php">Log In</a></li>
<?php } else { ?>
  <li class="navbarli"><a href="logout.php">Log Out</a></li>
<?php } ?>
      
    </ul>
  </nav>
</div>

<body>

</body>

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

