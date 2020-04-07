<?php
require_once('common.php');

$VALID_REDIRECT='mainPage.php';
$INVALID_REDIRECT='contactus.php';
$REDIRECT=$INVALID_REDIRECT;

$dbt = new DBTickets();

$result = $dbt->get_highest_ticketid();
$ticketno = $result[0][0] + 1;
$uname = $_SESSION['is-logged-in'];
$comments = $_POST['comments'];

if ($comments)
{
    try
    {
        $dbt->insert($ticketno, $uname, $comments);
    }
    
    catch (Exception $e)
    {
    echo "EXCEPTION: ".$e->getMessage();
    }

    $message = "Thanks for you feedback, returning to home page!";
    echo "<script type='text/javascript'>alert('$message'); window.location.href='mainPage.php'</script>";
}

else
{
    $message = "Invalid submission, please make sure you fill out the form.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href='contactus.php'</script>";
}



?>
