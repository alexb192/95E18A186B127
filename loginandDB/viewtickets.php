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
            ?>

            <?php
                foreach ($everything as $var)
                {
            ?>

            <tr id="<?php $counter ?>">
            <td><?php $var[0] ?></td>
            <td><?php $var[1] ?></td>
            <td><?php $var[2] ?></td>
            <td>
                <button onclick="deleteRow(0)">Delete</button>
            </td>
            </tr>

            <?php $counter++; } ?>
            
        </table>
    </body>
</html>

<script>
    function deleteRow(var rowNumber) {
        document.getElementById("ticketTable").deleteRow(rowNumber);
    }
</script>