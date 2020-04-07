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

        <?php
            $everything = DBTickets::lookup_all();
            echo "<table>";

            while ($row_users = mysqli_fetch_array($everything)) {
                //output a row here
                echo "<tr><td>".($row_users['ticketid'])."</td></tr>";
            }

            echo "</table>";
        ?>

    </body>
</html>
