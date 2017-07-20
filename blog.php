<?php
$statement = $db->query('SELECT COUNT(*) FROM `posts` WHERE `del` = 0');
$rel = $statement->fetch();
$countPosts = $rel[0];
$post_count = 12;
$count = intval($countPosts / $post_count);
if ($countPosts % $post_count) {
    $count++;
}
$pages = 1;
if (isset($_GET['page']) && $count >= $_GET['page']) {
    $pages = $_GET['page'];
}
for ($i = 1; $i <= $pages; $i++) {
    echo showMessages($i);
}
