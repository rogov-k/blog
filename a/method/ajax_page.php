<?php
session_start();
include('main.php');
if (isset($_POST['page'])) {
    $page = $_POST['page'];
    echo showMessages($page);
}