<?php
$dbname = 'blog';
$username = 'admin';
$password = '38q8jd9f';
$hosts = 'db';

$db = new PDO('mysql:host=' . $hosts . ';dbname=' . $dbname, $username, $password);
$db->exec('SET NAMES "utf8";');