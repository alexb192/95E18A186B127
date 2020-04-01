<?php
require_once('common.php');
?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="masterpagestyle.css" />

<title>
  Home Page - Planner
</title>

<div>
  <nav>
    <ul class="navbaritems">
      <li class="navbarli"><a href="">Home</a></li>
      <li class="navbarli"><a href="">View Days</a></li>
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
  This is the real page! Everything else is a fake!
  This is the real page! Everything else is a fake!
  This is the real page! Everything else is a fake!
  This is the real page! Everything else is a fake!
  This is the real page! Everything else is a fake!
  This is the real page! Everything else is a fake!
</body>

<div>
  <nav>
    <ul class="footeritems">
      <li>CS-3340 Group Project</li>
      <li><a href="contactus.php">Contact Us</a></li>
    </ul>
  </nav>
</div>


