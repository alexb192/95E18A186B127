<?php
require_once('common.php');
$content = "This is the page content";
include('masterpage.php');

if (!UserUtils::is_admin())
{
  HTTPUtils::redirect('mainPage.php');
  exit(0);
}

?>

<html>
<link rel="stylesheet" type="text/css" href="viewtickets.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<head>
<title>View Tickets</title>
</head>
    <body>
    <!-- HTML table to store ticketid, username and comments -->
        <table id="ticketTable">

            <tr>
                    <th>TicketID</th>
                    <th>Username</th>
                    <th>Comments</th>
            </tr>

            <?php
                $db = new DBTickets();
                $everything = $db->lookup_all();
            ?>

            <?php
                foreach ($everything as $var)
                {
            ?>

            <tr>
            <td><?php echo "$var[0]" ?></td>
            <td><?php echo "$var[1]" ?></td>
            <td><?php echo "$var[2]" ?></td>
            </tr>
            <?php } ?>
            
        </table>

        <button class = "button" onclick="deleteRowOnClick()">Delete All Tickets</button>
        
        <script src ='./viewtickets.js'></script>
    </body>


</html>
