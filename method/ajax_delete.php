<?php
session_start();
require 'connect_db.php';
require 'main.php';
if (l()) {
    $here = $db->prepare("UPDATE `posts` SET `del` = 1, `del_at` = :del WHERE (`id` = :id) LIMIT 1;");
    $here->execute([':id' => $_POST['delete'], ':del' => date("Y-m-d H:i:s")]);
}