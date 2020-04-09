<?php

final class DBTickets extends DB
{
 
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

 
      $sql = <<<ZZEOF
      CREATE TABLE tickets (
        ticketid INTEGER(5) PRIMARY KEY NOT NULL,
        user VARCHAR(80) NOT NULL,
        contents VARCHAR(255),
        FOREIGN KEY (user) REFERENCES users(user)
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
    $sql = "DROP TABLE IF EXISTS tickets";
    return $this->db_handle()->exec($sql);
  }




  public function insert($ticketid, $user, $contents)
  {
    // Create the entry to add...
    $entry = array(
      ':ticketid' => $ticketid,
      ':user' => $user,
      ':contents' => $contents
      
    );

    // Create the SQL prepared statement and insert the entry...
    $sql = 'INSERT INTO tickets VALUES (:ticketid, :user, :contents)';

    $stmt = $this->db_handle()->prepare($sql);
    return $stmt->execute($entry);
  }

  //
  // erase()
  //
  // Erases all entries in the tickets table
  //
  public function erase()
  {
    $entry = array( ':ticketid' => $ticketid );

    // Create the SQL prepared statement and delete the entry...
    $sql = 'DELETE FROM tickets';
    $stmt = $this->db_handle()->prepare($sql);
    $stmt->execute($entry);
  }


 
// function to lookup a ticket by id
  public function lookup($ticketid)
  {
    // Create the entry to add...
    $entry = array( ':ticketid' => $ticketid );

    // Create the SQL prepared statement and insert the entry...
    try
    {
      $sql = 'SELECT * FROM tickets WHERE ticketid = :ticketid';
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


  public function lookup_all()
  {
    // Create the SQL prepared statement and insert the entry...
    $sql = 'SELECT * FROM tickets ORDER BY user';
    $stmt = $this->db_handle()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function get_highest_ticketid()
  {
    $sql = 'SELECT MAX(ticketid) FROM tickets';
    $stmt = $this->db_handle()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
?>
