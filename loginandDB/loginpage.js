$(document).ready(function(){
    $("input").focus(function(){
      $(this).css("background-color", "yellow");
    });
    $("input").blur(function(){
      $(this).css("background-color", "green");
    });
  });

  function invalidPrompt(varY) {
   
    if(varY == TRUE)
    {
        alert("Invalid Login!");
        return true;
    }

    else if(varY == FALSE)
    {
        return true;
    }
        
    
 }