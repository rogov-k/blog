<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    require 'connect_db.php';
    require 'main.php';
    if (isset($_POST['text'])) {
        $text = $_POST['text'];
        $text = str_replace("<", "&lt;", $text);
        $text = str_replace(">", "&gt;", $text);
        $date = date("Y-m-d H:i:s");
        preg_match_all('/#[\w]+/u', $text, $output);
        $text = preg_replace('/#[\w]+/u', "", $text);
        $tags = '';
        foreach ($output[0] as $i) {
            $tags .= trim($i) . ' ';
        }
        $here = $db->prepare("INSERT INTO `posts` (`text`, `date`, `tags`) VALUES (:text, :date, :tags)");
        $here->execute([':text' => $text, ':date' => $date, ':tags' => $tags]);
        $post = array(
            'id' => $db->lastInsertId(),
            'tags' => $tags,
            'text' => $text,
            'date' => $date
        );
        echo getPost($post);
    }
}