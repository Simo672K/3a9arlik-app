<?php
  class DBhandler{
    static $db;
    static $user;
    static $pass;
    static $conn;

    public function __construct($db, $usr, $pass){
      DBhandler::$db= $db;
      DBhandler::$user= $usr;
      DBhandler::$pass= $pass;
    }

    public static function connection_init(){
      try{
        DBhandler::$conn= new PDO("mysql:host=localhost;dbname=".DBhandler::$db, DBhandler::$user, DBhandler::$pass);
        DBhandler::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return "Connection established"; 
      }catch (PDOException $e){
        echo "Connection failed". $e->getMessage();
        die();
      }
    }

    public static function get_result($sql_query){
      if(DBhandler::$conn){
        return DBhandler::$conn->query($sql_query);
      }else{
        throw new Exception("Make sure you inititalize connection with 'connection_init()'");
      }
    }
    

    public static function connection_kill(){
      DBhandler::$conn= null;
      return;
    }
  }
?>