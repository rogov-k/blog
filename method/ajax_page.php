<?php
session_start();
require 'main.php';
if (isset($_POST['page'])) {
    $page = $_POST['page'];
    echo showMessages($page);
}