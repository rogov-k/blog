<?php
session_start();
include('connect_db.php');
include('main.php');
if (l()) {
    $here = $db->prepare("UPDATE `posts` SET `del` = 1, `del_at` = :del WHERE (`id` = :id) LIMIT 1;");
    $here->execute([':id' => $_POST['delete'], ':del' => date("Y-m-d H:i:s")]);
}