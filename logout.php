<?php
  session_start();
  foreach($_SESSION as $key=>$val){
    unset($_SESSION[$key]);
  };
  $_SESSION["user_logged"]= false;
  print_r($_SESSION);
  header("refresh:5;url=index.php");