<?php
require_once('common.php');

$content = "This is the page content";
include('masterpage.php');

?>

<!DOCTYPE html>


<html>
  <head>
    <title>Calendar</title>
  </head>

  <body>

  <iframe src="https://calendar.google.com/calendar/embed?src=en.canadian%23holiday%40group.v.calendar.google.com&ctz=America%2FToronto" style="border: 0" width="1120" height="840" frameborder="0" scrolling="no"></iframe>
  </body>
</html>