<?php
    $content = "This is the page content";
    include('masterpage.php');
?>

<?php
  if (isset($_GET['choice']))
  {
    $choice = $_GET['choice'];
    if ($choice == 'dark' || $choice == 'light')
    {
      setcookie("sitestyle", $choice, time()+60*60*24*100, "/");  // set a cookie for 30 days remembering choice
      header("location: settings.php");
      exit();
    }
  }
?>

<?php
include './masterpage_cookiecheck.php';
?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="settings.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src ='./settings.js'></script>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Settings</title>
  </head>
  <body>
  <div class="container">
    <div class="choices">
      <h1>Theme Selection</h1>
      <?php if (UserUtils::is_logged_in()) 
      { ?>
        <a class="dark" onclick="setDarkOnClick()" href="settings.php?choice=dark">Dark</a>
        <a class="light" onclick="setLightOnClick()" href="settings.php?choice=light">Light</a>
<?php } ?>
    <?php if (!UserUtils::is_logged_in()) 
          { ?>
            <a class="dark" href="settings.php?choice=dark">Dark</a>
            <a class="light" href="settings.php?choice=light">Light</a>
    <?php } ?>
      
    </div>
</div>

  </body>
</html>

