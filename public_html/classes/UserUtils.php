<?php
final class UserUtils
{
  // checks if the user is logged in
  public static function is_logged_in()
  {
    return array_key_exists('is-logged-in', $_SESSION);
  }

  // function to check if the user is an admin
  public static function is_admin()
  {
    return array_key_exists('is-admin', $_SESSION);
  }

  public static function log_in_user($user)
  {
    $_SESSION['is-logged-in'] = $user;
    $_SESSION['var'] = FALSE;
  }

  // gets called to login admin user and set the $_SESSION variable
  public static function log_in_admin($user)
  {
    $_SESSION['is-admin'] = $user;
  }

  public static function get_user_logged_in()
  {
    if (!self::is_logged_in())
      return FALSE;
    else
      return array_key_exists('is-logged-in', $_SESSION);
  }

  public static function log_out_user()
  {
    unset($_SESSION['is-logged-in']);
    unset($_SESSION['is-admin']);
  }

}
?>
