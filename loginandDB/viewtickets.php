<?php
require_once('common.php');
$content = "This is the page content";
include('masterpage.php');

if (!UserUtils::is_admin())
{
  HTTPUtils::redirect('login.php');
  exit(0);
}

?>

<html>
    <body>
        <table id="ticketTable">

            <tr>
                        <th>TicketID</th>
                        <th>Username</th>
                        <th>Content</th>
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

        <button onclick="deleteRowOnClick()">Delete All Tickets</button>
        
        <script>
            function deleteRowOnClick() {
            var myTable = document.getElementById("ticketTable");
            var rowCount = myTable.rows.length; while(--rowCount) myTable.deleteRow(rowCount);
        }
        </script>
    </body>


</html>
