<?php
//
//
//
function html5_prolog($title, $css_files = array(), $js_files = array())
{
  echo "<!DOCTYPE html>\n".
    "<html><head><title>".
    htmlspecialchars($title).
    "</title>"
  ;
  
  foreach ($css_files as $css_file)
    echo "<link rel='stylesheet' type='text/css' href='$css_file' />";
  
  foreach ($js_files as $js_file)
    echo "<script src='$js_file' type='application/javascript'></script>";

  echo "</head><body>\n";
}

//
//
//
function html5_epilog()
{
  echo "</body></html>";
}

//
//
//
function html5_body_header($title)
{
  echo '<div id="header"><h1>'.htmlspecialchars($title).'</h1></div>';
}

//
//
//
function html5_body_menu()
{
  echo '<div id="menu">';
  echo 'Menu';
  echo '</div>';
}

//
//
//
function html5_body_content($content)
{
  echo '<div id="content">';
  echo $content;
  echo '</div>';
}

function html5_body_midsection($content)
{
  html5_body_menu();
  html5_body_content($content);
}

//
//
//
function html5_body_footer()
{
  echo '<div id="footer">Footer</div>';
}

//
//
//
function html5_page($title, $css=array(), $js=array(), $content="")
{
  html5_prolog($title, $css, $js);
  html5_body_header($title);
  html5_body_midsection($content);
  html5_body_footer();
  html5_epilog();
}

?>
