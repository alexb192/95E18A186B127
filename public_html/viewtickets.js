// function that clears the HTML table on view tickets page
// also used AJAX to run deletetickets.php to delete everything
// inside of the tickets table
function deleteRowOnClick() {
    var myTable = document.getElementById("ticketTable");
    var rowCount = myTable.rows.length; while(--rowCount) myTable.deleteRow(rowCount);
    $.get("deletetickets.php");
    return false;
}