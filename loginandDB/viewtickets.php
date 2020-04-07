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
                foreach ($everything as $var)
                {
                    echo "\n", $var['ticketid'], "\t\t", $var['user'], "\t\t", $var['contents'];
                }
            ?>
        </table>
    </body>
</html>
