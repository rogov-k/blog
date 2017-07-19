<?php
session_start();

//token = salt + ":" + MD5(salt + ":" + secret)
$salt = 'LqFGuC';
$_SESSION['token']['value'] = $salt . ':' . md5($salt . ':' . time());

include('a/method/main.php');
include('a/method/connect_db.php');
$url = explode('?', $_SERVER['REQUEST_URI']);
switch ($url[0]) {
    case '/blog':
        include('a/view/header.tpl.php');
        include('a/blog.php');
        include('a/view/footer.tpl.php');
        break;
    case '/logout':
        include('a/view/header.tpl.php');
        include('a/method/exit.php');
        include('a/view/footer.tpl.php');
        break;
    case '/write':
        include('a/view/header.tpl.php');
        include('a/view/write.tpl.php');
        include('a/view/footer.tpl.php');
        break;
    default:
        header($_SERVER['SERVER_PROTOCOL'] . " 404 Not Found");
        include('404.html');
}