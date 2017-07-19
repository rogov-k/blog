<?php
$dbname = 'slojno71';
$username = 'slojno71';
$password = '4yjKBTOb';

$db = new PDO('mysql:host=localhost;dbname=' . $dbname, $username, $password);
$db->exec('SET NAMES "utf8";');