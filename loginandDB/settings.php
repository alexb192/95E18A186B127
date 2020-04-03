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
<html>
  <head>
    <meta charset="utf-8" />
    <title>Settings</title>
    
  </head>
  <body>
    <h1 id="heading">Example Text</h1>
    <div>
      <label>Theme</label>
      <a href="settings.php?choice=dark">Dark</a>
      <a href="settings.php?choice=light">Light</a>
    </div>
  </body>
</html>
