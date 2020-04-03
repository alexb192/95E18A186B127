<?php
    $content = "This is the page content";
    include('masterpage.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Settings</title>
    <script src="./settings.js"></script>
  </head>
  <body>
    <h1 id="heading">Example Text</h1>
    <div>
      <label>Theme</label>
      <button type="button" onclick="changeTheme('dark');">Dark Theme</button>
      <button type="button" onclick="changeTheme('light');">Light Theme</button>
    </div>
  </body>
</html>
