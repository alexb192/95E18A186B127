<?php
//
// class DBUser
//
// This class implements a database's user table. The table has
// two columns:
//
//   user - the user's login name (e.g., an email)
//   pass - the user's SALTED+HASHED password
//
// For security reasons SQL prepared statements are used
// everywhere any data is injected into SQL outside of the
// code in this class.
//
final class DBUser extends DB
{
  //
  // __construct()
  //
  // Construct a DBUser object invoking the parent constructor.
  //
  public function __construct()
  {
    // NOTE: PHP doesn't call the parent construtor automatically!
    parent::__construct();
  }

  //
  // admin_create_all_structures()
  //
  // This method creates all database structures required for the
  // DBUser table.
  //
  public function admin_create_all_structures()
  {
    if ($this->admin_prohibit_create_drop())
      throw new Exception('Database CREATEs are prohibited by admin.');

    // NOTE: There is no need to use an SQL prepared statement call
    //       here since the SQL code is 100% from this site and safe.

    //
    // user is meant to hold the user's email address
    // pass is meant to hold the result of password_hash() for the user's
    //   password. The password length is large. For why see the
    //   PHP documentation on password_hash().
    //
    $sql = <<<ZZEOF
CREATE TABLE users (
  user VARCHAR(80) PRIMARY KEY,
  pass VARCHAR(255) NOT NULL,
  isadmin BOOLEAN NOT NULL DEFAULT(FALSE)
)
ZZEOF;
    return $this->db_handle()->exec($sql); // This is NOT a prepared statement call!
  }

  //
  // admin_destroy_all_structures()
  //
  // This method destroys all database structures required for the
  // DBUser table.
  //
  public function admin_destroy_all_structures()
  {
    if ($this->admin_prohibit_create_drop())
      throw new Exception('Database DROPs are prohibited by admin.');

    // NOTE: There is no need to use an SQL prepared statement call
    //       here since the SQL code is 100% from this site and safe.
    $sql = "DROP TABLE IF EXISTS users";
    return $this->db_handle()->exec($sql);
  }

  //
  // compute_password_hash($pass)
  //
  // This method computes a secure password hash. Some references
  // including why this is done in this manner are:
  //
  // PHP Function Calls:
  //   http://php.net/manual/en/function.password-hash.php
  //   http://php.net/manual/en/function.password-verify.php
  //
  protected final function compute_password_hash($pass)
  {
    global $CFG;

    // Combine the site-wide salt with $pass...
    $salted_pass = $CFG->site_wide_password_salt.$pass;
    return password_hash($salted_pass, PASSWORD_DEFAULT);
  }

  //
  // function verify_password_hash($plain_pass, $hashed_pass)
  //
  protected final function verify_password_hash($plain_pass, $hashed_pass)
  {
    global $CFG;

    // Combine the site-wide salt with $pass...
    $salted_pass = $CFG->site_wide_password_salt.$plain_pass;
    return password_verify($salted_pass, $hashed_pass) === TRUE;
  }

  //
  // insert($user, $pass)
  //
  // Inserts a new user $user into the DBUser table having password $pass.
  //
  public function insert($user, $pass, $isadmin=FALSE)
  {
    // Create the entry to add...
    $entry = array(
      ':user' => $user,
      ':pass' => $this->compute_password_hash($pass),
      ':isadmin' => ($isadmin == TRUE ? 1 : 0 )
    );

    // Create the SQL prepared statement and insert the entry...
    $sql = 'INSERT INTO users VALUES (:user, :pass, :isadmin)';
    $stmt = $this->db_handle()->prepare($sql);
    return $stmt->execute($entry);
  }

  //
  // erase($user)
  //
  // Erases an existing user $user from the DBUser table.
  //
  public function erase($user)
  {
    $entry = array( ':user' => $user );

    // Create the SQL prepared statement and delete the entry...
    $sql = 'DELETE FROM users WHERE user = :user';
    $stmt = $this->db_handle()->prepare($sql);
    $stmt->execute($entry);
  }

  //
  // check_user_pass($user, $pass)
  //
  // Checks that user $user exists and has password $pass. If
  // such is true, then TRUE is returned. Otherwise FALSE is returned.
  //
  public function check_user_pass($user, $pass)
  {
    // Create the entry to add...
    $entry = array( ':user' => $user );

    // Create the SQL prepared statement and insert the entry...
    try
    {
      $sql = 'SELECT pass FROM users WHERE user = :user';
      $stmt = $this->db_handle()->prepare($sql);
      $stmt->execute($entry);
      $result = $stmt->fetchAll();
      if (count($result) == 1 && array_key_exists('pass', $result[0]))
      {
        return $this->verify_password_hash($pass, $result[0]['pass']);
      }
      else
        return FALSE;
    }
    catch (PDOException $e)
    {
      return FALSE;
    }
  }

  public function check_admin($user)
  {
    $query = "SELECT * FROM users WHERE user='$user' AND isadmin = 1 LIMIT 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1)
    {

      trigger_error("Admin has been found!");

    }
    else
    {
      trigger_error("Admin not found, for some reason");
    }
  }
  
  // public function check_admin($user)
  // {
  //   $entry = array( ':user' => $user );
  //   try
  //   {
      
  //     $sql = 'SELECT isadmin FROM users WHERE user = :user';
  //     $result = mysqli_query($sql);
      
  //     if (mysqli_fetch_assoc($result) == 0)
  //     {
  //       return TRUE;
  //     }
  //     else 
  //     {
  //       return FALSE;
  //     }
  
  //   }
  //   catch (PDOException $e)
  //   {
  //     return FALSE;
  //   }
  // }

  //
  // lookup($user)
  //
  // Attempt to look up user $user in the DBUser table. If $user
  // is not found, then FALSE is returned. Otherwise an array
  // containing the DBUser entry is returned. The column names
  // are: "user" and "pass".
  //
  // If the user is not found or a DB error occurs FALSE is
  // returned. Otherwise an associative array for the record is returned.
  //
  public function lookup($user)
  {
    // Create the entry to add...
    $entry = array( ':user' => $user );

    // Create the SQL prepared statement and insert the entry...
    try
    {
      $sql = 'SELECT * FROM users WHERE user = :user';
      $stmt = $this->db_handle()->prepare($sql);
      $stmt->execute($entry);
      $result = $stmt->fetchAll();
      if (count($result) != 1)
        return FALSE;
      else
        return $result[0];
    }
    catch (PDOException $e)
    {
      return FALSE;
    }
  }

  //
  // lookup_all()
  //
  // Look up all users in the users table. This function permits
  // PDOExceptions to leak.
  //
  public function lookup_all()
  {
    // Create the SQL prepared statement and insert the entry...
    $sql = 'SELECT * FROM users';
    $stmt = $this->db_handle()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
?>
