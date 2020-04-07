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
        <table>
                    <tr>
                        <th>TicketID</th>
                        <th>Username</th>
                        <th>Content</th>
                    </tr>
            <?php
                $db = new DBTickets();
                $everything = $db->lookup_all();

                foreach ($everything as $var)
                    echo "<tr><td>$var[0]</td><td>$var[1]</td><td>$var[2]</td></tr>"; 
            ?>
        </table>
    </body>
</html>
