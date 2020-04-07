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
            <?php
                $db = new DBTickets();
                $everything = $db->lookup_all();
                if (sizeof($everything) % 3 == 0)
                {

                    foreach ($everything as $var)
                    {
                        echo "\n", $var['ticket_id'], "\t\t", $var['user'], "\t\t", $var['contents'];
                    }

                } else {
                    echo "DATABASE IS WACK";
                }
            ?>
        </table>
    </body>
</html>
