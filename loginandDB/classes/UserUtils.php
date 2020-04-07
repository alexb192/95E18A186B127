<?php
final class UserUtils
{
  public static function is_logged_in()
  {
    return array_key_exists('is-logged-in', $_SESSION);
  }

  public static function is_admin()
  {
    return array_key_exists('is-admin', $_SESSION);
  }

  public static function log_in_user($user)
  {
    $_SESSION['is-logged-in'] = $user;
    $_SESSION['var'] = FALSE;
  }

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
