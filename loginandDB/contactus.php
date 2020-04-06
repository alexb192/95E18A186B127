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
      src="https://cdn.tiny.cloud/1/4obol5ncui1w0606zz59fi5f6judhc1l4p2qkg6h7l2eqtjr/tinymce/5/tinymce.min.js"
      referrerpolicy="origin"
    ></script>
    <script src='./contactus.js'></script>

  </head>

  <body>
    <h1>Contact Us</h1>
    <h2>We would love to hear your feedback!</h2>
    
    <div class="tinymce">
      <form method="post">
        <!-- <textarea id="mytextarea"></textarea> -->
         <textarea id="mytextarea"   name="event"></textarea> 

      </form>
    </div>
    <form method="post">

        <input class="submitbutton" type="submit" value="Submit" />
        
      </form>
      <a href="insertxml.php">Insert</a>
  </body>
</html>

<!--  <?php //echo $_POST['event'] ?> -->