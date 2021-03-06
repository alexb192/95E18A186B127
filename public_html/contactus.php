<?php
    require_once('common.php');
    $content = "This is the page content";
    include('masterpage.php');

if (!UserUtils::is_logged_in())
{
  $message = "You must log in to access this page.";
  echo "<script type='text/javascript'>alert('$message'); window.location.href='login.php'</script>";
  exit(0);
}
?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="contactus.css" />

<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <script
      src="https://cdn.tiny.cloud/1/4obol5ncui1w0606zz59fi5f6judhc1l4p2qkg6h7l2eqtjr/tinymce/5/tinymce.min.js"
      referrerpolicy="origin"
    ></script>
    <title>Contact Us</title>
    <script src='./contactus.js'></script>

  </head>

  <body>
    <h1>Contact Us</h1>
    <h2>We would love to hear your feedback!</h2>
    
    <div class="tinymce">
    <!-- upon submission form action to processcontactus.php -->
      <form action="processcontactus.php" method="post">
        <textarea name = "comments" id="mytextarea" ></textarea>
        <input class="submitbutton" type="submit" value="Submit" />
      </form>
    </div>
  </body>
</html>
