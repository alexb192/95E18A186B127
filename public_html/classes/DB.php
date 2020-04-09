<?php
//
// class DB
//
// This class is meant to serve as the base class of all classes
// using the database. Its constructor creates a database connection
// if one hasn't been created already and assigns it to $dbh. Derived
// classes will use the db_handle() method to obtain the PDO database
// handle for subsequent operations.
//
abstract class DB
{
  private static $dbh = NULL;

  public function __construct()
  {
    global $CFG;

    // Initialize the database connection if it hasn't been...
    if (self::$dbh === NULL)
    {
      self::$dbh = new PDO($CFG->db_dsn, $CFG->db_user, 
        $CFG->db_pass);

      self::$dbh->setAttribute(
        PDO::ATTR_ERRMODE, 
        PDO::ERRMODE_EXCEPTION
      );

      self::$dbh->setAttribute(
        PDO::ATTR_CASE, 
        PDO::CASE_LOWER
      );

      self::$dbh->setAttribute(
        PDO::ATTR_ORACLE_NULLS, 
        PDO::NULL_NATURAL
      );
    }
  }

  protected final function db_handle()
  {
    return self::$dbh;
  }

  protected final function admin_prohibit_create_drop()
  {
    global $CFG;

    return $CFG->db_admin_prohibit_create_drop === TRUE;
  }

  public abstract function admin_create_all_structures();
  public abstract function admin_destroy_all_structures();
}

?>
