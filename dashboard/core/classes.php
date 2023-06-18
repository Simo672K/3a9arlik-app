<?php 
  require_once("../core/constants.php");
  require_once("../core/db.php");
  require_once("../core/classes.php");

  class UserData {
    static $result;
    
    public static function get_overview_data($user_id) {
      UserData::$result= DBhandler::$conn->prepare("SELECT sum(post_views) views, count(post_user_id) nmbr_posts, count(message_post_id) recived_messages 
      FROM `post` inner join message on message.message_post_id=post.post_id WHERE post_user_id=:user_id GROUP BY post_user_id;");
      UserData::$result->execute(array("user_id"=>$user_id));
    }

    public static function get_user_info($user_id) {
      UserData::$result= DBhandler::$conn->prepare("SELECT * FROM user WHERE user_id=:user_id");
      UserData::$result->execute(array("user_id"=>$user_id));
    }
  }

  new DBhandler(DB_NAME, DB_USER, DB_PASSWORD);
  DBhandler::connection_init();
