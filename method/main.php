<?php
function l()
{
    return (isset($_SESSION['user']['auth']) && $_SESSION['user']['auth'] === true) ? true : false;
}

function getHashtags($text)
{
    $str = '';
    if ($text != '') {
        $str = '<div class="tags">';
        $words = explode(' ', $text);
        foreach ($words as $element) {
            if ($element != "") {
                $element = mb_substr($element, 1);
                $url = urldecode($element);
                $str .= '<a href="?tag=' . $url . '">#' . $element . '</a>';
            }
        }
        $str .= '</div>';
    }
    return $str;
}

function getPost($post)
{
    include('connect_db.php');
    $textLong = (strlen($post['text']) > 600) ? true : false;
    $stm = $db->prepare('SELECT * FROM `users` WHERE `id` = :author  LIMIT 1');
    $stm->execute([':author' => $post['author']]);
    $data = $stm->fetchAll();
    $post['name'] = $data[0]['name'];
    $post['img'] = $data[0]['img'];
    $unixTime = strtotime($post['date']);
    $date = date('M j, Y', $unixTime);
    $dateNow = date('M j, Y');
    $dateYesterday = date('M j, Y', strtotime("yesterday"));
    if ($date == $dateNow) {
      $date = 'Today';
    } else if ($date == $dateYesterday) {
      $date = 'Yesterday';
    }
    $post['date'] = $date;

    ob_start();
    include($_SERVER['DOCUMENT_ROOT'] . '/view/post.tpl.php');
    $post = ob_get_contents();
    ob_end_clean();
    return $post;
}

function showMessages($nowPage = 1)
{
    include('connect_db.php');
    $statement = $db->query('SELECT COUNT(*) FROM `posts` WHERE `del` = 0');
    $rel = $statement->fetch();
    $countPosts = $rel[0];
    $post_count = 12;
    $count = intval($countPosts / $post_count);
    if ($countPosts % $post_count) {
        $count++;
    }
    $str = '';
    $now = $nowPage * 12 - 12;
    $stm = $db->prepare('SELECT * FROM `posts` WHERE `del` = 0 ORDER BY `id` DESC LIMIT :min, :max');
    $stm->bindValue(':min', $now, PDO::PARAM_INT);
    $stm->bindValue(':max', $post_count, PDO::PARAM_INT);
    $stm->execute();
    $data = $stm->fetchAll();
    foreach ($data as $post) {
        $str .= getPost($post);
    }
    return $str;
}