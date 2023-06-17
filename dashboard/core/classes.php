<?php 
  require_once("../core/constants.php");
  require_once("../core/db.php");
  require_once("../core/classes.php");

  class UserData {
    static $result;
    
    public static function overview($user_id) {
      // UserData::$result= DBhandler::$conn->prepare("SELECT count(post_user_id) nmbr_posts, post_views FROM post WHERE post_user_id=:user_id GROUP BY post_user_id");
      // UserData::$result->execute(array("user_id"=>$user_id));
    } 
  }

  new DBhandler(DB_NAME, DB_USER, DB_PASSWORD);
  DBhandler::connection_init();
