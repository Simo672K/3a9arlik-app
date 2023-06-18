<?php
require_once("constants.php");
require_once("db.php");

function generate_filename($file_name){
  $permitted_chars = '-_0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  return substr(str_shuffle($permitted_chars), 0, 64). $file_name;
}
class User{
  static $id;
  static $name;
  static $email;
  static $phone;
  static $password;
  static $logged_in= false;

  public static function auth_user($email, $password){
    $query_result= DBhandler::get_result("SELECT * FROM ". USER_TABLE . " WHERE user_email=\"$email\"");
    while($row= $query_result->fetch(PDO::FETCH_ASSOC)){
      User::$id= $row["user_id"];
      User::$name= $row["user_name"];
      User::$email= $row["user_email"];
      User::$phone= $row["user_phone"];
      User::$password= $row["user_password"];
    }

    if(password_verify($password, User::$password) && User::$email === $email){
      User::$logged_in= true;
    }
  }

  public static function add_user($name, $email, $phone, $password){
    $hashed_password= password_hash($password, PASSWORD_DEFAULT);
    $values= [
      "name"=> $name, 
      "email"=> $email, 
      "phone"=> $phone,
      "password"=> $hashed_password
    ];

    $user_query= "INSERT INTO ". USER_TABLE. "(`user_name`, `user_email`, `user_phone`, `user_password`) VALUES (:name, :email, :phone, :password)";
    $query= DBhandler::$conn->prepare($user_query);
    $query->execute($values);

    if($query) 
      return;
    
    throw new Exception("Failed to create user");
  }
}

class Post{
  static $result;

  // list of all the post records
  public static function get_all_posts(){
    Post::$result= DBhandler::get_result("SELECT post_id, post_title, post_description, post_price, post_views, post_added, post_images, post_type, city_name as post_city FROM " 
    . POST_TABLE . " INNER JOIN city on post.post_city_id= city.city_id ORDER BY post_added DESC");
  }

  public static function get_all_posts_paginated($page, $per_page){
    $offset= ($page - 1) * $per_page;
    return DBhandler::get_result("SELECT post_id, post_title, post_description, post_price, post_views, post_added, post_images, post_type, city_name as post_city FROM " 
    . POST_TABLE . " INNER JOIN city on post.post_city_id= city.city_id ORDER BY post_added DESC LIMIT $per_page OFFSET $offset");
  }

  // create new post
  public static function create_post($values){
    $query= DBhandler::$conn->prepare("INSERT INTO ". POST_TABLE .
    " (`post_user_id`, `post_title`, `post_description`, `post_addresse`, 
      `post_coordinates`, `post_price`, `post_images`, 
      `post_city_id`, `post_category_id`, `post_type`) VALUES 
      (:user_id, :post_title, :post_description, :post_addresse, :post_coordinates, :post_price, :post_images, :post_city_id, :post_category_id, :post_type)
    ");
    $query->execute($values);
  }

  // post user data
  public static function get_post_user_data($id){
    $query = DBhandler::$conn->prepare("SELECT post.post_user_id, user.user_name, user.user_phone FROM post INNER JOIN user ON user.user_id = post.post_user_id WHERE post_id = :id");
    $query->execute(array("id" => $id));

    $result= $query->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  // one specific post
  public static function get_post($id) {
    Post::$result= DBhandler::get_result("SELECT * FROM " . POST_TABLE . " WHERE post_id=$id");
  }

  // for updating views
  public static function update_views($id) {
    DBhandler::$conn->query("UPDATE post SET post_views=post_views+1 WHERE post_id=$id");
  }

  public static function get_detailed_post($id) {
    Post::$result= DBhandler::get_result("SELECT post_id, post_title, post_addresse, post_description, post_images, post_coordinates, post_price, post_views, post_added, post_type, city_name as post_city, category_name as post_category  FROM " 
    . POST_TABLE . " INNER JOIN city on post.post_city_id=city.city_id INNER JOIN category on post.post_category_id=category.category_id WHERE post_id=$id");
  }

  public static function get_user_posts($user_id) {
    Post::$result= DBhandler::get_result("SELECT post_id, post_title, post_addresse, post_price, post_views, post_added, post_type, city_name as post_city, category_name as post_category  FROM " 
    . POST_TABLE . " INNER JOIN city on post.post_city_id=city.city_id INNER JOIN category on post.post_category_id=category.category_id WHERE post_user_id=$user_id ORDER BY post_added DESC");
  }
  
  public static function get_paginated_user_posts($user_id, $page, $per_page) {
    $offset= ($page - 1) * $per_page;
    return DBhandler::get_result("SELECT post_id, post_title, post_addresse, post_price, post_views, post_added, post_type, city_name as post_city, category_name as post_category  FROM " 
    . POST_TABLE . " INNER JOIN city on post.post_city_id=city.city_id INNER JOIN category on post.post_category_id=category.category_id WHERE post_user_id=$user_id ORDER BY post_added DESC LIMIT $per_page OFFSET $offset");
  }

  // for filtring and search
  public static function filter_posts($city, $category, $type){
    $query= "SELECT post_id, post_title, post_description, post_price, post_views, post_added, post_images, post_type, city_name 
      as post_city FROM " . POST_TABLE . " INNER JOIN city on post.post_city_id= city.city_id WHERE post_type='$type'"
      .($city == "all"? "": "AND post_city_id=$city")." ".($category == "all"? "": "AND post_category_id=$category")." ORDER BY post_added DESC";
    Post::$result= DBhandler::get_result($query);
  }

  public static function update_post($values) {
    $query= "UPDATE post SET post_title=:post_title, 
      post_description=:post_description, post_addresse=:post_addresse, 
      post_coordinates=:post_coordinates, post_price=:post_price, post_type=:post_type WHERE 
      post_id=:post_id";
    Post::$result= DBhandler::$conn->prepare($query);
    Post::$result->execute($values);
  }
  public static function delete_post($id){
    Post::$result= DBhandler::get_result("DELETE FROM post WHERE post_id=$id");
  }
}

class City{
  static $cities=array();

  public static function get_cities(){
    $query_result= DBhandler::get_result("SELECT * FROM ". CITY_TABLE);
    while($row= $query_result->fetch(PDO::FETCH_ASSOC)){
      array_push(City::$cities, $row);
    }
  }
}

class Category{
  static $categories=array();

  public static function get_categories(){
    $query_result= DBhandler::get_result("SELECT * FROM ". CATEGORY_TABLE);
    while($row= $query_result->fetch(PDO::FETCH_ASSOC)){
      array_push(Category::$categories, $row);
    }
  }
}

class Message {
  static $result;

  public static function post_message($values) {
    Message::$result= DBhandler::$conn->prepare(
      "INSERT INTO message (message_sender_name, message_sender_email, message_sender_content, message_post_id, message_user_id) 
      VALUES (:message_sender_name, :message_sender_email, :message_sender_content, :message_post_id, :message_user_id)"
    );
    Message::$result->execute($values);
  }

  public static function get_user_messages($user_id) {
    Message::$result= DBhandler::$conn->prepare(
      "SELECT * FROM message WHERE message_user_id=:user_id"
    );
    Message::$result->execute(array(
      "user_id"=>$user_id,
    ));
  }

}

new DBhandler(DB_NAME, DB_USER, DB_PASSWORD);
new City();

DBhandler::connection_init();
City::get_cities();
Category::get_categories();