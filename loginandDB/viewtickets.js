function deleteRowOnClick() {
    var myTable = document.getElementById("ticketTable");
    var rowCount = myTable.rows.length; while(--rowCount) myTable.deleteRow(rowCount);
    $.get("deletetickets.php");
    return false;
}