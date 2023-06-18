<?php
  require_once('includes/session.php');
  require_once("../core/classes.php");

  if(!isset($_GET["post_id"])) {
    header("location:all-posts.php");
  }else {
    Post::delete_post($_GET["post_id"]);
    header("location:all-posts.php");
  }

  