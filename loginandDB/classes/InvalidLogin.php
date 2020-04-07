<?php
  class InvalidLogin
  {
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