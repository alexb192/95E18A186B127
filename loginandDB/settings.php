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
<html>
  <head>
    <meta charset="utf-8" />
    <title>Settings</title>
  </head>
  <body class="stylesbody">
    <div class="choices">
      <h1>Styles</h1>
      <a class="dark" href="settings.php?choice=dark">Dark</a>
      <a class="light" href="settings.php?choice=light">Light</a>
    </div>
  </body>
</html>

