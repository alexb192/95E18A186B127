<?php
require_once('common.php');

$VALID_REDIRECT='mainPage.php';
$INVALID_REDIRECT='contactus.php';
$REDIRECT=$INVALID_REDIRECT;

$dbt = new DBTickets();

$result = $dbt->get_highest_ticketid();
// to increment the tickets, we add one to the highest ticketid every time a new entry is made
$ticketno = $result[0][0] + 1;
$uname = $_SESSION['is-logged-in'];

// Strip_tags used to prevent HTML injection
// Note: this wil render some features of the HTML editor to be useless
$comments = strip_tags($_POST['comments']);

// if a user submits a form with valid input
if ($comments)
{
    try
    {
        // the ticketno, username, and comments are insterted into the tickets table
        $dbt->insert($ticketno, $uname, $comments);
    }
    
    catch (Exception $e)
    {
    echo "EXCEPTION: ".$e->getMessage();
    }

    // on succesful form submission
    $message = "Thanks for you feedback, returning to home page!";
    echo "<script type='text/javascript'>alert('$message'); window.location.href='mainPage.php'</script>";
}

else
{
    // invalid form submission
    $message = "Invalid submission, please make sure you fill out the form.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href='contactus.php'</script>";
}



?>
