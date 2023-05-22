<?php
require_once("constants.php");
require_once("db.php");

class User{
  static $name;
  static $email;
  static $phone;
  static $password;
  static $logged_in= false;

  public static function auth_user($email, $password){
    $query_result= DBhandler::get_result("SELECT * FROM ". USER_TABLE . " WHERE user_email=\"$email\"");
    while($row= $query_result->fetch(PDO::FETCH_ASSOC)){
      User::$name= $row["user_name"];
      User::$email= $row["user_email"];
      User::$phone= $row["user_phone"];
      User::$password= $row["user_password"];
    }

    if(User::$password === $password && User::$email === $email){
      User::$logged_in= true;
    }
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

new DBhandler(DB_NAME, DB_USER, DB_PASSWORD);
new City();

DBhandler::connection_init();
City::get_cities();
Category::get_categories();