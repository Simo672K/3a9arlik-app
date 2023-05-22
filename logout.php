<?php
  session_start();
  foreach($_SESSION as $key=>$val){
    unset($_SESSION[$key]);
  };
  $_SESSION["user_logged"]= false;
  echo "Redirect, attendez ";
  header("refresh:2;url=index.php");