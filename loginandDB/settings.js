function changeTheme(theme) {
  if (theme == "dark") {
    document.getElementById("navbarli").style.color = "gray";
    document.getElementById("navbaritems").style.backgroundColor = "#333";
  }
  if (theme == "light") {
    document.getElementById("navbarli").style.color = "black";
    document.getElementById("navbaritems").style.backgroundColor = "white";
  }
}
