// function uses AJAX to make the login input fields yellow when clicked on
// and green when clicked off of
$(document).ready(function(){
    $("input").focus(function(){
      $(this).css("background-color", "yellow");
    });
    $("input").blur(function(){
      $(this).css("background-color", "green");
    });
  });

 
 