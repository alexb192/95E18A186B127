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
                $counter = 0;
                $db = new DBTickets();
                $everything = $db->lookup_all();

                foreach ($everything as $var)
                {
                    echo "<tr id="$counter"><td>$var[0]</td><td>$var[1]</td><td>$var[2]</td><td><button onclick="deleteRow($counter)">Delete</button></td></tr>";
                    $counter++;
                }
            ?>
        </table>
    </body>
</html>

<script>
    function deleteRow(var rowNumber) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ticketTable").deleteRow(rowNumber);
            }
        };
    }
</script>