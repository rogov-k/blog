<?php
session_start();
include('main.php');
$error = true;
$message = '';
if ($_SESSION['token']['value'] !== $_POST['csrf']) {
    $message = 'Ошибка сервера, повторите пожалуйста позже.' . PHP_EOL;
    $error = false;
}
if (empty($_POST['text'])) {
    $message .= 'Нужно написать хоть одну строчку.';
    $error = false;
}
echo $message;


	if(l()){ 
    include('connect_db.php'); 
    if(isset($_POST['text'])){
      $text = $_POST['text'];
      $text = str_replace("<", "&lt;", $text);
      $text = str_replace(">", "&gt;", $text);
      $date = date("Y-m-d H:i:s");
      preg_match_all('/#[\w]+/u', $text, $output);
      $text = preg_replace('/#[\w]+/u', "", $text);
      $tags = '';
      foreach($output[0] as $i){
        $tags.=trim($i) . ' ';
      }
      $here = $db->prepare("INSERT INTO `posts` (`text`, `date`, `tags`) VALUES (:text, :date, :tags)");  
      $here->execute([':text' => $text, ':date' => $date, ':tags'=> $tags]);
      $post = array(
        'id' => $db->lastInsertId(),
        'tags' => $tags,
        'text' => $text,
        'date' => $date
      );
    }
  }
