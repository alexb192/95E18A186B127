// AJAX used to run the setlight.php script when light button clicked
function setLightOnClick() {
    $.get("setlight.php");
    return false;
}

// AJAX used to run the setdark.php script when dark button clicked
function setDarkOnClick() {
    $.get("setdark.php");
    return false;
}