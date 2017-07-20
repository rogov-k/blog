<?php
session_start();
require 'connect_db.php';
if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    $sql = $db->prepare('SELECT * FROM `users` WHERE `login` = :login AND `password` = :password LIMIT 1;');
    $sql->execute([':login' => $login, ':password' => $password]);
    $user = $sql->fetch();
    if (!empty($user)) {
        $_SESSION['user']['auth'] = true;
        $_SESSION['user']['id'] = $user['id'];
        $_SESSION['user']['img'] = $user['img'];
        $_SESSION['user']['name'] = $user['name'];
        $_SESSION['user']['type'] = $user['type'];
    }
}
header('location: /');