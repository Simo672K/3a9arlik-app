<?php 
  require_once("../core/init_session.php");

  if(!$_SESSION["user_logged"]){
    header('Location:../login.php');
  }