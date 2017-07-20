<?php

session_start();

//token = salt + ":" + MD5(salt + ":" + secret)
$salt = 'LqFGuC';
$_SESSION['token']['value'] = $salt . ':' . md5($salt . ':' . time());

require 'method/main.php';
require 'method/connect_db.php';
$url = explode('?', $_SERVER['REQUEST_URI']);
switch ($url[0]) {
  case '/':
    require 'view/header.tpl.php';
    require 'blog.php';
    require 'view/footer.tpl.php';
    break;
  case '/login':
    include 'method/login.php';
    break;
  case '/logout':
    require 'view/header.tpl.php';
    require 'method/exit.php';
    require 'view/footer.tpl.php';
    break;
  case '/write':
    require 'view/header.tpl.php';
    require 'view/write.tpl.php';
    require 'view/footer.tpl.php';
    break;
  default:
    header($_SERVER['SERVER_PROTOCOL'] . " 404 Not Found");
    include('view/404.tpl.php');
}