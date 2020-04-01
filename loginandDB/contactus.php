<?php
    $content = "This is the page content";
    include('masterpage.php');
?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="contactus.css" />

<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <script
      src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"
      referrerpolicy="origin"
    ></script>

    <script>
      tinymce.init({
        selector: "#mytextarea"
      });
    </script>
  </head>

  <body>
    <h1>Contact Us</h1>
    <h2>We love to hear your feedback!</h2>

    <div class="tinymce">
      <form method="post">
        <textarea id="mytextarea">Hello, World!</textarea>
      </form>
    </div>
  </body>
</html>
