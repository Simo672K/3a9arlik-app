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

  public static function get_all_posts($limiter=null){
    Post::$result= DBhandler::get_result("SELECT * FROM " . POST_TABLE);
  }

  public static function create_post($values){
    $query= DBhandler::$conn->prepare("INSERT INTO ". POST_TABLE .
    " (`post_user_id`, `post_title`, `post_description`, `post_addresse`, 
      `post_coordinates`, `post_price`, `post_images`, 
      `post_city_id`, `post_category_id`, `post_type`) VALUES 
      (:user_id, :post_title, :post_description, :post_addresse, :post_coordinates, :post_price, :post_images, :post_city_id, :post_category_id, :post_type)
    ");
    $query->execute($values);
  }
  public static function get_post($id){
    Post::$result= DBhandler::get_result("SELECT * FROM " . POST_TABLE . " WHERE post_id=$id");
    DBhandler::$conn->query("UPDATE post SET post_views=post_views+1 WHERE post_id=$id");
  }
  public static function update_post(){}
  public static function delete_post(){}
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

new DBhandler(DB_NAME, DB_USER, DB_PASSWORD);
new City();

DBhandler::connection_init();
City::get_cities();
Category::get_categories();