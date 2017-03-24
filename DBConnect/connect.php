<?php
/**
 *This is the database class for the midterm_handon db.
 */
class Connect
{
  private static $dsn = "mysql:host=localhost;dbname=gather_tryout_1";
  private static $username = "root";
  private static $password = "";
  private static $db;

  private function __construct()
  {
    
  }
  public static function dbConnect() {
    if(!isset(self::$db)){
      try {
        self::$db = new PDO(self::$dsn, self::$username, self::$password);
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOEXCEPTION $e) {
        echo $e->getMessage();
      }
      return self::$db;
    }
  }
}
?>
