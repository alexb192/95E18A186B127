<?php
  class InvalidLogin
  {
    public function onPasswordFail($x)
    {
        if($x)
        {
            echo '<script>alert("Invalid Password")</script>';
        }
        else
        {
            exit(0);
        }
    }
  }
?>