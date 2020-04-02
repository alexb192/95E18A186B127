<?php
    $content = "This is the page content";
    include('masterpage.php');
?>

<!Doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="plannerStyle.css">

    <title>
    Home Page
    </title>

</head>

<body>
<div class="header-text">
            <h1 id="planner-head">Daily Planner</h1>
            <h2 id="time-head"></h2>
      </div>
      <form id='formPlanner'>
    <div class="container" id="plannerContainer">
    </div>    
      </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src='./plannerScript.js'></script>
</body>



</html>