<?php

$dbname = 'blog';
$username = 'admin';
$password = '38q8jd9f';
$hosts = 'mysql';

$db = new PDO('mysql:host=' . $hosts . ';port=3306;dbname=' . $dbname, $username, $password);
$db->exec('SET NAMES "utf8";');