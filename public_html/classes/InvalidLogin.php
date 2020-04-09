<?php
  class InvalidLogin
  {
    // function that gets called when user inputs incorrect login information
    // sends an alert that displays on the screen
    public function onPasswordFail($x)
    {
        if($x)
        {
            echo '<script>alert("Invalid Username/Password")</script>';
            unset($_SESSION['var']);
        }
        else
        {
            exit(0);
        }
    }
  }
?>