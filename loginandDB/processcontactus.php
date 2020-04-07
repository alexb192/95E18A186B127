<?php
require_once('common.php');

$dbt = new DBTickets();

$result = $dbt->get_highest_ticketid();
$ticketno = $result[0][0] + 1;
$uname = $_SESSION['is-logged-in'];

try
{
    $dbt->insert($ticketno, $uname, $_POST['comments']);
}

catch (Exception $e)
{
echo "EXCEPTION: ".$e->getMessage();
}

?>
