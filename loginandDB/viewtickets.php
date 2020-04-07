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
                $everything = DBTickets::lookup_all();
                foreach ($everything as $ticketid=>$user=>$text)
                {
            ?>

                <tr>
                    <td><?php echo $ticketid; ?></td>
                    <td><?php echo $user; ?></td>
                    <td><?php echo $text; ?></td>
                </tr>

            <?php
                }
            ?>
        </table>
    </body>
</html>
